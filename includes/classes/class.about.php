<?php
class ISC_ABOUT
{
	private $pageTitle = "";

	public function HandlePage()
	{
		$action = "";
		if (isset($_REQUEST['a'])) {
			$action = isc_strtolower($_REQUEST['a']);
		}
		switch ($action) {
			case "everymod": {
				$this->ShowEveryMod();
				break;
			}
			case "collab": {
				$this->ShowCollab();
				break;
			}
			case "themod": {
				$this->ShowTheMod();
				break;
			}
			case "custom": {
				$this->ShowCustom();
				break;
			}
			case "help": {
				$this->ShowHelp();
				break;
			}
			case "team": {
				$this->ShowTeam();
				break;
			}
			case "funny": {
				$this->ShowFunny();
				break;
			}
			case "press": {
				$this->ShowPress();
				break;
			}
			case "retail": {
				$this->ShowRetail();
				break;
			}
			case "returns": {
				$this->ShowReturns();
				break;
			}
			case "nonprofit": {
				$this->ShowNonprofit();
				break;
			}
			case "lookbook": {
				$this->ShowLookbook();
				break;
			}
			default: {
				$this->ShowAbout();
				break;
			}
		}
	}
	
	private function ShowAbout() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "About Modify";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowEveryMod() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Every Mod Ever";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_allmods");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowTheMod() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Introducing the Mod";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_themod");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowCollab() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Collaborations";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_collaborations");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowHelp() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Help & FAQ";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_faq");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowCustom() {
		$this->pageTitle = "Custom Watches - " . GetConfig('StoreName');
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_custom");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowTeam() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Team";
		$desc = "Create custom watches for your company, your non-profit fundraiser, to put into a time capsule, or for any other reason.";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaDescription($desc);
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_team");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowFunny() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "What We Find Funny";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_funny");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowPress() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Press";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_press");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowRetail() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Retail";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_retail");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowNonprofit() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Nonprofit Partners";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_nonprofit");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowLookBook() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Lookbook";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_lookbook");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}
	
	private function ShowReturns() {
		$this->pageTitle = GetConfig('StoreName') . " - " . "Returns & Exchanges";
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("about_returns");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
