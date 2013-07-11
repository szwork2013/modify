<?php
/**
 * Product Made By Panel.
 */
class ISC_SPLITTESTCONTENT_PANEL extends PANEL
{
	/**
	 * Set the settings for this panel.
	 */
	public function SetPanelSettings()
	{
		if(isset($_GET['v']) && $_GET['v'] == "1") {
			$GLOBALS['SplitContent'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetPanelContent('Press');
			$GLOBALS['SplitContent'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetPanelContent('TheMod');
			$GLOBALS['SplitContent'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetPanelContent('FixedCTA');
		} else {
			$GLOBALS['SplitContent'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetPanelContent('Press');
			$GLOBALS['SplitContent'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetPanelContent('HomeTiles');
		}
	}
}
