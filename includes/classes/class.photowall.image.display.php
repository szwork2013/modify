<?php

class ISC_PHOTOWALL
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Photo Wall";
	}

	public function HandlePage()
	{
		
		$GLOBALS['AdditionalStylesheets'][] = GetConfig('AppPath').'/templates/__master/Styles/master'.$GLOBALS['ISTEST'].'.css?ver=2.01';
		$GLOBALS['AdditionalStylesheets'][] = GetConfig('AppPath').'/templates/__master/Styles/scrollbars.css';
		$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/sandbox/sandbox'.$GLOBALS['ISTEST'].'.js?ver=2.03';
		$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/sandbox/scroll.js';
		$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/hashchange.js';
		$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/jquery/phototagger.js';


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
				$GLOBALS['ImageURLs'] .= "<img class='box' src='templates/modify/images/blue/photowall/". $images[$index] . "' />\n";
			}
			else {
				$showNext = 0;
				break;	
			}
		}
		
		if(!isset($showNext)) {
			$GLOBALS ['PageNumber'] = '<div id="page-nav"><a href="photowall.php?page='. ($page + 1) .'"></a></div>';
		}

		$this->showPhotowall();

	}
	
	private function showPhotowall()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("photowall");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}

?>