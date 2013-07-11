<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_NONPROFITS'] = GetClass('ISC_NONPROFITS');
	$GLOBALS['ISC_CLASS_NONPROFITS']->HandlePage();