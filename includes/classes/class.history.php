<?php
class ISC_HISTORY
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Modify's History";
	}

	public function HandlePage()
	{

		$GLOBALS['AdditionalStylesheets'][] = "https://fonts.googleapis.com/css?family=PT+Sans+Caption&v2";

		$this->showAbout();

	}

	private function showAbout()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("CompanyHistory");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
