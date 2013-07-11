<?php

	require_once(dirname(__FILE__) . '/../../includes/classes/class.addon.php');

	class ADDON_PHOTOWALL extends ISC_ADDON
	{

		/**
		* Constructor
		* Setup the addon-specific variables through the addon parent class
		*/
		public function __construct()
		{
			$this->SetId('addon_photowall');
			$this->SetName('Photowall');
			$this->LoadLanguageFile();

			$this->RegisterMenuItem(array(
				'location' => 'mnuContent',
				'text' => GetLang('PhotowallMenuText'),
				'description' => GetLang('PhotowallMenuDescription'),
				'id' => 'addon_photowall'
			));

			$this->SetImage('logo.gif');
			$this->SetHelpText(GetLang('PhotowallHelpText'));
		}

		/**
		* Init
		* Initialize any other addon-specific code that needs to run
		*/
		public function init()
		{
			$this->ShowSaveAndCancelButtons(false);
		}

		/**
		* EntryPoint
		* Start by collecting a few options for generating the AdWords ads
		*
		* @return Void
		*/
		public function EntryPoint()
		{
			if (isset($_GET['w']) && $_GET['w'] == "popupPhotowallTag") {
				$this->popupPhotowallTag();
			}
			else {
				// set the database member object
				$this->db = $GLOBALS['ISC_CLASS_DB'];
				$this->engine = &$GLOBALS['ISC_CLASS_ADMIN_ENGINE'];
				
				$this->setTemplateVars();
				$GLOBALS['HTTPHost'] = $_SERVER['HTTP_HOST'];
				$GLOBALS['ISC_CLASS_ADMIN_CATEGORY'] = GetClass('ISC_ADMIN_CATEGORY');
				$GLOBALS['CategoryOptions'] = $GLOBALS['ISC_CLASS_ADMIN_CATEGORY']->GetCategoryOptions(0, "<option %s value='%d'>%s</option>", "selected=\"selected\"", "", false);
				$this->ParseTemplate('photowall.form');
			}
		}
		
		private function setTemplateVars() {
			$GLOBALS['Title'] = getLang('ModifyWatchesPhotowall');
			$GLOBALS['Message'] = getLang('PhotowallMenuDescription');
			$GLOBALS['SaveAndAddAnother'] = GetLang('SaveAndAddAnother');
			$GLOBALS['PhotowallIntro'] = GetLang('ManagePhotowallsIntro');
				
			
			// create a html template for use in javascript when adding photowall image rows and store it as a javascript string
			$GLOBALS['maxUploadSize'] = ISC_UPLOADHANDLER::$maxUploadSize;
			$GLOBALS['photowallImage_thumbnailWidth'] = ISC_PHOTOWALL_IMAGE::getSizeWidth(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL);
			$GLOBALS['photowallImage_thumbnailHeight'] = ISC_PHOTOWALL_IMAGE::getSizeHeight(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL);
			$GLOBALS['photowallImage_newRowTemplate_js'] = isc_json_encode(Interspire_Template::getInstance('admin')->render('photowall.form.images.row.tpl'));
			$GLOBALS['sessionid'] = session_id();
			$_SESSION['STORESUITE_CP_TOKEN'] = $_COOKIE['STORESUITE_CP_TOKEN'];

			// send through the file extensions that should be accepted as images
			$extensions = '*.' . implode(';*.', ISC_IMAGE_LIBRARY_FACTORY::getSupportedImageExtensions());
			$GLOBALS['photowallImage_swfUploadFileTypes_js'] = isc_json_encode($extensions);

			// generate statements to initialise new photowallimages as javascript objects
			$GLOBALS['photowallImage_javascriptInitialiseCode'] = '';
			$GLOBALS['ISC_PHOTOWALL_IMAGE'] = GetClass('ISC_PHOTOWALL_IMAGE');
			try {
				$photwallImages = $GLOBALS['ISC_PHOTOWALL_IMAGE']->getPhotowallImagesFromDatabase();
			}
			catch (ISC_PHOTOWALL_IMAGE_EXCEPTION $e) {
				
			}
			foreach ($photwallImages as /** @var ISC_PHOTOWALL_IMAGE */$photowallImage) {
				try {
					$preview = $photowallImage->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL, true);
					$zoom = $photowallImage->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_ZOOM, true);
					$original = $photowallImage->getSourceUrl();
				} catch (Exception $Exception) {
					$preview = false;
					$zoom = false;
					$original = false;
				}
				$GLOBALS['photowallImage_javascriptInitialiseCode'] .= sprintf(
					'new PhotowallImages.Image({id:%1$d,preview:%2$s,zoom:%3$s,original:%6$s,description:%4$s,sort:%5$d});',
					/*1*/ $photowallImage->getPhotowallImageId(),
					/*2*/ isc_json_encode($preview),
					/*3*/ isc_json_encode($zoom),
					/*4*/ isc_json_encode($photowallImage->getDescription()),
					/*5*/ $photowallImage->getSort(),
					/*6*/ isc_json_encode($original)
				);
			}
			$GLOBALS['photowallImagesList'] = Interspire_Template::getInstance('admin')->render('photowall.form.images.tpl');
		}
		
		private function popupPhotowallTag() {
			if(isset($_REQUEST['ImageID'])) {
				$image = $this->getPhotowallImage($_REQUEST['ImageID']);
			}
			else {
				throw new Exception("Image ID Required");
				return;
			}
			
			$GLOBALS['ImageURL'] = $this->getImagePhoto($image);
			$GLOBALS['ImageID'] = $_REQUEST['ImageID'];
			
			echo Interspire_Template::getInstance('admin')->render('photowall.form.tagger.tpl');
		}
		
		private function getPhotowallImage() {
			if (isset($_REQUEST['ImageID'])) {
				$photoid = $_REQUEST['ImageID'];
			}
			else {
				throw new Exception("Image ID Required");	
				return;
			}
			
			try {
				$GLOBALS['ISC_PHOTOWALL_IMAGE'] = GetClass('ISC_PHOTOWALL_IMAGE');
				return $GLOBALS['ISC_PHOTOWALL_IMAGE']->getPhotowallImageFromDatabase($photoid);
			}
			catch (ISC_PHOTOWALL_IMAGE_EXCEPTION $e) {
				throw new Exception($e->getMessage());
			}
		}
		
		private function getImagePhoto($photowallImage) {
			try {
				return $photowallImage->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_STANDARD, true);
			} catch (Exception $Exception) {
				return false;
			}
		}
	}
