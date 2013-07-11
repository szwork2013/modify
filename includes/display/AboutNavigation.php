<?php

	CLASS ISC_ABOUTNAVIGATION_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			// Set active tab
			$page = $_SERVER['REQUEST_URI'];
			$activeClassName = "a";
			if(preg_match("/about\.php$/", $page) || preg_match("/about\.php\?a=(everymod|collab|themod)$/", $page)) {
				$GLOBALS['StoryActive'] = $activeClassName;
			}
			if(preg_match("/about\.php$/", $page)) {
				$GLOBALS['OverviewActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=themod$/", $page)) {
				$GLOBALS['TheModActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=everymod$/", $page)) {
				$GLOBALS['EveryModActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=collab$/", $page)) {
				$GLOBALS['CollabActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=help$/", $page)) {
				$GLOBALS['HelpActive'] = $activeClassName;
				$GLOBALS['FAQActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=returns$/", $page)) {
				$GLOBALS['HelpActive'] = $activeClassName;
				$GLOBALS['ReturnsActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=team$/", $page)) {
				$GLOBALS['TeamActive'] = $activeClassName;
				$GLOBALS['WhoWeActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=funny$/", $page)) {
				$GLOBALS['TeamActive'] = $activeClassName;
				$GLOBALS['FunnyActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=press$/", $page)) {
				$GLOBALS['PressActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=retail$/", $page)) {
				$GLOBALS['RetailersActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=nonprofit$/", $page)) {
				$GLOBALS['NonprofitActive'] = $activeClassName;
			} else if(preg_match("/about\.php\?a=custom$/", $page)) {
				$GLOBALS['CustomActive'] = $activeClassName;
			} 
		}
		
	}
