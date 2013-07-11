<?php
class ISC_SPECIAL
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Special Occasion Engraving";
	}

	public function HandlePage()
	{

		$GLOBALS['AdditionalStylesheets'][] = "http://fonts.googleapis.com/css?family=PT+Sans+Caption&v2";
		$this->showCommunity();

	}

	private function showCommunity()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("special");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
