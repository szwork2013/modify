<?php
class ISC_FAQ
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Frequently Asked Questions";
	}

	public function HandlePage()
	{

		$GLOBALS['AdditionalStylesheets'][] = "https://fonts.googleapis.com/css?family=PT+Sans+Caption&v2";
		$GLOBALS['AdditionalStylesheets'][] = GetConfig('AppPath').'/javascript/jquery/plugins/imodal/imodal.css';

		$this->showAbout();

	}

	private function showAbout()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("faq");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
