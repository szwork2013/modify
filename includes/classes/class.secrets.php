<?php
class ISC_SECRETS
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Secrets Page";
	}

	public function HandlePage()
	{

		$this->showSecrets();

	}

	private function showSecrets()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("secrets");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
