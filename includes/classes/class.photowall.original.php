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
			$this->startModalImage();
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
		if(isset($_COOKIE['PHOTOWALL_MODAL_IMAGE']) && $_COOKIE['PHOTOWALL_MODAL_IMAGE'] == 'true') {
			isc_unsetCookie('PHOTOWALL_MODAL_IMAGE');
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("photowallindiv");
			$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
			return;
		}
		
		// Define the path as relative
		$path = $_SERVER['DOCUMENT_ROOT']."/templates/modify/images/blue/photowall/";
		// Using the opendir function
		$dir_handle = @opendir($path) or die("ERROR: Cannot open  <b>$path</b>");
		
		while (false !== ($file = readdir($dir_handle)))
		{
			if ($file != '.' && $file != '..' && strpos($file, "250_") !== false) {
				$images[] = $file;
			}
		}
		
		if(isset($_GET['page'])) {
			$page = intval($_GET['page']);
		}
		else {
			$page = 0;	
		}
		
		for ($i = 0; $i < 40; $i++) {
			$index = $page * 40 + $i;
			if(isset($images[$index])) {
				$GLOBALS['ImageURLs'] .= "<img id='photo".$index."' class='box' src='templates/modify/images/blue/photowall/". $images[$index] . "' />\n";
			}
			else {
				$showNext = 0;
				break;	
			}
		}
		
		if(!isset($showNext)) {
			$GLOBALS ['PageNumber'] = '<div id="page-nav"><a href="photowall.php?page='. ($page + 1) .'"></a></div>';
		}
		
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("photowall");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function getImage() {
		$photoid = $_REQUEST['id'];
		
		try {
			$GLOBALS['ISC_PHOTOWALL_IMAGE'] = GetClass('ISC_PHOTOWALL_IMAGE');
			$photowallImage = $GLOBALS['ISC_PHOTOWALL_IMAGE']->getPhotowallImageFromDatabase($photoid);
		}
		catch (ISC_PHOTOWALL_IMAGE_EXCEPTION $e) {
			throw new Exception($e->getMessage());
		}
		
		try {
			$original = $photowallImage->getSourceUrl();
		} catch (Exception $Exception) {
			$original = false;
		}
		
		$GLOBALS['ImageId'] = $photoid;
		$GLOBALS['ImageDescription'] = $photowallImage->getDescription();
		$GLOBALS['ImageURL'] = $original;
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