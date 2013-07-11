<?php
class ISC_MEDIA
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Media Hearts Modify";
	}

	public function HandlePage()
	{

		$this->showAbout();

	}

	private function showAbout()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("media");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
