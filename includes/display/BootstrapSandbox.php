<?php

	CLASS ISC_BOOTSTRAPSANDBOX_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			$GLOBALS['ISC_CLASS_SANDBOX'] = GetClass('ISC_SANDBOX');
			$GLOBALS['SandboxBootstrap'] = $GLOBALS['ISC_CLASS_SANDBOX']->GetJSON();
			$GLOBALS['SandboxQuoteBootstrap'] = $GLOBALS['ISC_CLASS_SANDBOX']->GetQuoteJSON();
		}
	}
