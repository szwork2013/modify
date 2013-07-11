<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_CONTACT'] = GetClass('ISC_CONTACT');
	$GLOBALS['ISC_CLASS_CONTACT']->HandlePage();