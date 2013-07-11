<?php

CLASS ISC_GREYBAR_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		if(isset($_GET['disp'])) {
			$splitVal = $_GET['disp'];
			// These are all just arbitrary numbers.
			
			// 1 is for the alternative Interchangeable text
			if($splitVal==1) {
				$GLOBALS['Interchangeable'] = "Personalize";
				$GLOBALS['TwoSizes'] = "Two Sizes";
			}
			// 2 is for the Two Sizes text
			elseif($splitVal==2) {
				$GLOBALS['Interchangeable'] = "Mix-and-Match";
				$GLOBALS['TwoSizes'] = "Big and Bigger";
			}
		}
		else {
			$GLOBALS['Interchangeable'] = "Mix-and-Match";
			$GLOBALS['TwoSizes'] = "Two Sizes";	
		}
	}
}
