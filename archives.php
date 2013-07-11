<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_ARCHIVES'] = GetClass('ISC_ARCHIVES');
	$GLOBALS['ISC_CLASS_ARCHIVES']->HandlePage();