<?php

CLASS ISC_ABOUTCONTACT_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {     
		  $visitormail = $_POST['email']; 
		  $message = $_POST['message']; 
		  
		  if($visitormail == "") {
			$GLOBALS['AboutError'] = "<div id=\"contactError\">You must enter an e-mail address :)</div>";
			die();
		  }
		  elseif((!strstr($visitormail,"@") || !strstr($visitormail,"."))) {
			$GLOBALS['AboutError'] = "<div id=\"contactError\">Please enter a valid e-mail :)</div>";
			die();
		  }
		  elseif($message=="") {
			$GLOBALS['AboutError'] = "<div id=\"contactError\">Don't you want to send us a message? :)</div>";
			die();
		  }
	  
		  $todayis = date("l, F j, Y, g:i a") ;
		  
		  $subject = "I have a bone to pick with you!"; 
		  
		  $message = stripcslashes($message); 
		  
		  $from = "From: $visitormail\r\n";
		  
		  
		  mail("sean@modifywatches.com", $subject, $message, $from);
		}
	  
	  $GLOBALS['AboutError'] = "<div style=\"background-color:#d5ffca;border:solid 1px #7fff5c;\" id=\"contactError\">Thanks! We'll get back to you! :)</div>";
                
	}
}
