<?php

CLASS ISC_ABOUTCONTACT_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {          
		  $visitormail = $_POST['email']; 
		  $message = $_POST['message']; 
		  
		  
		  if($visitormail == "") {
			$GLOBALS['AboutError'] = "<div id=\"contactError\" style=\"display:block;\">You must enter an e-mail address :)</div>";
			die();
		  }
		  elseif((!strstr($visitormail,"@") || !strstr($visitormail,"."))) {
			$GLOBALS['AboutError'] = "<div id=\"contactError\" style=\"display:block;\">Please enter a valid e-mail :)</div>";
			die();
		  }
		  elseif($message=="") {
			$GLOBALS['AboutError'] = "<div id=\"contactError\" style=\"display:block;\">Don't you want to send us a message? :)</div>";
			die();
		  }
	  
		  $todayis = date("l, F j, Y, g:i a") ;
		  
		  $subject = "[MW: Contact Form] " . substr($message, 10) ."..."; 
		  
		  $message = stripcslashes($message); 
		  
		  $from = "From: $visitormail\r\n";
		  
		  
		  mail("aaron@modifywatches.com", $subject, $message, $from);
		  
		  $GLOBALS['AboutError'] = "<div style=\"background-color:#d5ffca;border:solid 1px #7fff5c;display:block;\" id=\"contactError\">Thanks! We'll get back to you! :)</div>";
		}
                
	}
}
