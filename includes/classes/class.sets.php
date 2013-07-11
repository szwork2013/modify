<?php
/**
 * The checkout process class.
 *
 * Handles everything to do with the checkout process.
 */
class ISC_SETS
{
	/**
	 * Handle the incoming page request.
	 */
	public function HandlePage()
	{
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle(GetConfig('StoreName').' - Browse Collections');
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate('sets');
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

}
