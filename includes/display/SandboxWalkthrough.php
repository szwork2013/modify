<?php

CLASS ISC_SANDBOXWALKTHROUGH_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		if(isset($_GET['a']) && $_GET['a'] == "build") {
			$GLOBALS['ShowWalkthrough'] = 1;
		} else {
			$GLOBALS['ShowWalkthrough'] = 0;
		}
	}
}
