<?php

class ISC_PHOTOWALL
{
	private $pageTitle = "";
	protected $error;

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Photo Wall";
	}

	public function HandlePage()
	{
		$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/hashchange.js';
		
		//Check if we are loading an iframe modal
		if(isset($_GET['ismodal']) && $_GET['ismodal'] == 'true') {
			$this->getModalImageJSON();
		}
		//Check if we are loading an individual photo
		else if(isset($_GET['id']) && !empty($_GET['id'])) {
			try {
				$this->getImage();
			}
			catch (Exception $e) {
				$this->error = $e->getMessage();
			}
			$this->showPhotowall();	
		}
		else {
			$this->showPhotowall();		
		}

	}
	
	private function showPhotowall()
	{
		// If this is set, we are showing an iFrame modal. Parse the template and do not move forward.
		//if(isset($_COOKIE['PHOTOWALL_MODAL_IMAGE']) && $_COOKIE['PHOTOWALL_MODAL_IMAGE'] == 'true') {
//			isc_unsetCookie('PHOTOWALL_MODAL_IMAGE');
//			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("photowallindiv");
//			$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
//			return;
//		}
		
		//Set page for infinite scroll
		if(isset($_GET['page'])) {
			$page = intval($_GET['page']);
		}
		else {
			$page = 0;	
		}
		
		$GLOBALS['ISC_PHOTOWALL_IMAGE'] = GetClass('ISC_PHOTOWALL_IMAGE');
		try {
			$photwallImages = $GLOBALS['ISC_PHOTOWALL_IMAGE']->getPhotowallImagesFromDatabase($page, 40);
		}
		catch (ISC_PHOTOWALL_IMAGE_EXCEPTION $e) {
					die($e->getMessage());
		}
		$GLOBALS['ImageURLs'] = "";
		$index = 0;
		foreach ($photwallImages as /** @var ISC_PHOTOWALL_IMAGE */$photowallImage) {
			try {
				$preview = $photowallImage->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL, true);
			} catch (Exception $Exception) {
				$preview = false;
			}
			$GLOBALS['ImageURLs'] .= "<a class='photoimage' href='https://dev.modifywatches.com/photowall.php?ismodal=true&id=".$photowallImage->getPhotowallImageId()."' rel='photos'><img id='photo".$photowallImage->getPhotowallImageId()."' class='box' src='". $preview . "' /></a>\n";
			$index++;
		}
		
		if($index == 40) {
			$GLOBALS ['PageNumber'] = '<div id="page-nav"><a href="photowall.php?page='. ($page + 1) .'"></a></div>';
		}
		
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		if(isset($_GET['facebook'])) {
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("photowallfacebook");
		}
		else {
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("photowall");
		}
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function getImage() {
		$photoid = $_REQUEST['id'];
		if (!is_numeric($photoid)) {
			throw new Exception("ID must be an integer");
			return;	
		}
		
		try {
			$GLOBALS['ISC_PHOTOWALL_IMAGE'] = GetClass('ISC_PHOTOWALL_IMAGE');
			$photowallImage = $GLOBALS['ISC_PHOTOWALL_IMAGE']->getPhotowallImageFromDatabase($photoid);
		}
		catch (ISC_PHOTOWALL_IMAGE_EXCEPTION $e) {
			throw new Exception($e->getMessage());
		}
		
		try {
			$original = $photowallImage->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_STANDARD, true);
		} catch (Exception $Exception) {
			$original = false;
		}
		
		$GLOBALS['ImageId'] = $photoid;
		$GLOBALS['ImageDescription'] = $photowallImage->getDescription();
		$GLOBALS['ImageURL'] = $original;
	}
	
	private function getModalImageJSON() {
		$photoid = $_REQUEST['id'];
		$data = array();
		
		try {
			$GLOBALS['ISC_PHOTOWALL_IMAGE'] = GetClass('ISC_PHOTOWALL_IMAGE');
			$photowallImage = $GLOBALS['ISC_PHOTOWALL_IMAGE']->getPhotowallImageFromDatabase($photoid);
		}
		catch (ISC_PHOTOWALL_IMAGE_EXCEPTION $e) {
			throw new Exception($e->getMessage());
		}
		
		try {
			$original = $photowallImage->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_STANDARD, true);
		} catch (Exception $Exception) {
			$original = false;
		}
		
		$data['ImageId'] = $photoid;
		$data['ImageDescription'] = $photowallImage->getDescription();
		$data['ImageURL'] = $original;
		$data = json_encode($data);
		die($data);
	}
	
	private function startModalImage() {
		ISC_SetCookie("PHOTOWALL_MODAL_IMAGE", 'true');	
		header('Location:https://dev.modifywatches.com/photowall.php?id='.$_REQUEST['id']);
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}

?>