<? 
		require('facebook.php');
		
        $app_id = "202091219872590";
        $app_secret = "269fa49594b054327799ce48f6966cfe";
        $facebook = new Facebook(array(
			'appId' => $app_id,
			'secret' => $app_secret
        ));
		
		function parse_signed_request($signed_request, $secret) {
			list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
			
			// decode the data
			$sig = base64_url_decode($encoded_sig);
			$data = json_decode(base64_url_decode($payload), true);
			
			if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
				error_log('Unknown algorithm. Expected HMAC-SHA256');
				return null;
			}
			
			// check sig
			$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
			if ($sig !== $expected_sig) {
				error_log('Bad Signed JSON signature!');
				return null;
			}
			
			return $data;
		}
		
		function base64_url_decode($input) {
			return base64_decode(strtr($input, '-_', '+/'));
		}


 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Watches - Domo Watches</title>
</head>

<body style='overflow-x:hidden;'>
  <div id="fb-root"></div>
    <script type="text/javascript">
		window.fbAsyncInit = function() {
				//Your app details here
				FB.init({appId: '268363423204667', status: true, cookie: true, xfbml: true});
				//Resize the iframe when needed
				window.setTimeout(function() {
				FB.Canvas.setAutoResize();
				}, 50);
			};
			
			//Load the SDK asynchronously
			(function() {
				var e = document.createElement('script'); e.async = true;
				e.src = document.location.protocol +
				  '//connect.facebook.net/en_US/all.js';
				document.getElementById('fb-root').appendChild(e);
			}());
  </script>
 
 <?php
  
 if($signed_request = parse_signed_request($_REQUEST['signed_request'], $app_secret)) {
    if($signed_request["page"]["liked"]) {
      ?>
      	<div style="background-image:url('domolike.jpg');width:520px;height:560px;">
        	<div style="position:relative;top:205px;left:170px;">
            	<a href="https://www.modifywatches.com/sets.php?action=partners"><img src="shopnow.png" /></a>
            </div>
        </div>
      <?
    } else {
     ?>
     	<img src="domonolike3.jpg" />
     <?
    }
  }
  ?>
 </body>
</html>