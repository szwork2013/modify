<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_COMPARE'] = GetClass('ISC_MAILCHIMP_WEBHOOK');
	$GLOBALS['ISC_CLASS_COMPARE']->HandleCallback();
