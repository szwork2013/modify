<?php
class ISC_WOTMC
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Watch of the Month Club";
		$this->pageMetaDescription = "Modify Watches' Watch of the Month Club. Receive a new watch every month!";
		$this->pageMetaKeywords = "watch of the month, watch of the month club, mod of the month, mod of the month club";
	}

	public function HandlePage()
	{

		$GLOBALS['AdditionalStylesheets'][] = "https://fonts.googleapis.com/css?family=Lobster";
		
		$this->showAbout();

	}

	private function showAbout()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaKeywords($this->pageMetaKeywords);
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaDescription($this->pageMetaDescription);
		if(isset($_GET['verss'])) {
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("wotmc2");
		}
		else {
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("wotmc");
		}
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
