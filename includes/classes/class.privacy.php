<?php
class ISC_PRIVACY
{
	private $pageTitle = "";

	public function HandlePage()
	{
		$this->pageTitle = GetConfig('StoreName') . " - " . "Privacy Policy";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("privacy");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
