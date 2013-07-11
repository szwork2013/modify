<?php

	CLASS ISC_SHOPNAVIGATION_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			// Set active tab
			$page = $_SERVER['REQUEST_URI'];
			$activeClassName = "a";
			if(preg_match("/a=build/", $page)) {
				echo "Ok dude";
				$GLOBALS['CreateActive'] = $activeClassName;
			} else if(preg_match("/sets\.php$/", $page) || preg_match("/categories.*a=browse/", $page)) {
				$GLOBALS['BrowseActive'] = $activeClassName;
			} else if(preg_match("/watch-of-the-month\.php$/", $page)) {
				$GLOBALS['MOTMCActive'] = $activeClassName;
			}
		}
		
	}
