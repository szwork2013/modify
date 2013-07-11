<?php
class ISC_COMMUNITY
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Community";
	}

	public function HandlePage()
	{
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("community");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();

	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
