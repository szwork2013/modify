<?php

	CLASS ISC_COMMUNITYNAVIGATION_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			// Set active tab
			$page = $_SERVER['REQUEST_URI'];
			$activeClassName = "a";
			if(preg_match("/community\.php$/", $page)) {
				$GLOBALS['ModiFamilyActive'] = $activeClassName;
			} else if(preg_match("/watch-of-the-month\.php$/", $page)) {
				$GLOBALS['MOTMCActive'] = $activeClassName;
			}
		}
		
	}
