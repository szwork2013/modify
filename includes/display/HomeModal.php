<?php
class ISC_HOMEMODAL_PANEL extends PRODUCTS_PANEL
{
	public function SetPanelSettings()
	{
		$page = $_SERVER['REQUEST_URI'];
		if(isset($_COOKIE['email_upsell']) && $_COOKIE['email_upsell'] == '1') {
			$GLOBALS['ShowModal'] = "none";
		} else {
			setcookie('email_upsell',"1",time() + (86400 * 40)); // 86400 = 1 day
			$GLOBALS['ShowModal'] = "block";
		}
	}
}
