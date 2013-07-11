<?php
class ISC_REFERRAL_PAGE
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Referral Program";
		$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');
		if (CustomerIsSignedIn()) {
			$GLOBALS['AskLogin'] = '';
			$refcode = $GLOBALS['ISC_CLASS_CUSTOMER']->GetCustomerRefCode();
			if($refcode) {
				$GLOBALS['refcode'] = $refcode;
			}
			$GLOBALS['Sharing'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('ReferralSharing');
		}
		else {
			$GLOBALS['AskLogin'] = '<p>Please <a href="http://www.modifywatches.com/login.php">Login</a> or <a href="https://www.modifywatches.com/login.php?action=create_account">Register</a> to get your super dope code!';	
			$GLOBALS['Sharing'] = '';
		}
//		else {
//			// Naughty naughty, you need to sign in to be here
//			$this_page = urlencode(sprintf("referrals.php?action=%s", $action));
//			ob_end_clean();
//			header(sprintf("Location: %s/login.php?from=%s", $GLOBALS['ShopPath'], $this_page));
//			die();
//		}
	}

	public function HandlePage()
	{
		$this->showPage();

	}

	private function showPage()
	{
		
		
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("referral");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
