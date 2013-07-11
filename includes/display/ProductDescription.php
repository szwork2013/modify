<?php
CLASS ISC_PRODUCTDESCRIPTION_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		$GLOBALS['ProductDesc'] = $GLOBALS['ISC_CLASS_PRODUCT']->GetDesc();
		if(!trim($GLOBALS['ProductDesc']) || trim($GLOBALS['ProductDesc']) == "<p>Type a description for this product here...</p>") {
			$this->DontDisplay = true;
		}
	}
}
