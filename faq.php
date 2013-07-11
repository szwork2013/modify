<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_FAQ'] = GetClass('ISC_FAQ');
	$GLOBALS['ISC_CLASS_FAQ']->HandlePage();