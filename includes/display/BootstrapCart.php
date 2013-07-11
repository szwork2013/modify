<?php

	CLASS ISC_BOOTSTRAPCART_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			$GLOBALS['ISC_CLASS_CART'] = GetClass('ISC_CART');
			$GLOBALS['CartBootstrap'] = $GLOBALS['ISC_CLASS_CART']->GetJSON();
		}
	}
