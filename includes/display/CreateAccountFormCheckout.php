<?php

	CLASS ISC_CREATEACCOUNTFORMCHECKOUT_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			if(IsCheckingOut()) {
				$GLOBALS['CreateAccountHeading'] = GetLang("CreateAnAccountCheckout");
				$GLOBALS['CreateAccountButtonText'] = GetLang("ContinueRaquo");
				$_SESSION['IsCheckingOut'] = true;
			}
			else {
				$GLOBALS['CreateAccountHeading'] = GetLang("CreateAnAccount");
				$GLOBALS['CreateAccountButtonText'] = GetLang("CreateMyAccount");
			}
		}
	}
