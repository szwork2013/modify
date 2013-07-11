<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_SECRETS'] = GetClass('ISC_SECRETS');
	$GLOBALS['ISC_CLASS_SECRETS']->HandlePage();