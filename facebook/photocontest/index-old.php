<? 
		require ('facebook.php');
		
        $app_id = "225058427517861";
        $app_secret = "8d3a9419a9a060b67abd3f7c3fb2b66e";
        $facebook = new Facebook(array(
        'appId' => $app_id,
        'secret' => $app_secret,
        'cookie' => true
        ));
		
        $signed_request = $facebook->getSignedRequest();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Contest</title>
</head>

<body>
<link rel="stylesheet" href="landingpage.css" type="text/css" />
 <body style="overflow: hidden">
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
   FB.Canvas.setAutoResize();
    };
    (function() {
   var e = document.createElement('script'); e.async = true;
   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
   document.getElementById('fb-root').appendChild(e);
    }());
  </script>

  <div style="height:830px; width:522px;background-image:url('images/contestinfo.jpg');">
        <div style="width:522px;height:57px;background-image:url('images/sharebottom.jpg');position:relative;top:767px;">
        	<div style="position:relative;left:255px;top:15px;">
            	<script>
					function fbs_click() {
						u='http://dev.modifywatches.com/facebook/photocontest/redir.php';
						title='Modified Up';
						window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(title),'_blank','width=450,height=400'); return false;}
				</script>
				<a href="http://www.facebook.com/share.php?u=http://dev.modifywatches.com/" onclick="return fbs_click()" target="_blank">
					<img src="images/posttowall.jpg" alt="Share on Facebook" />
				</a>
            </div>
            <div style="position:relative;left:413px;top:-12px;">
                <div style="width:27px;height:27px;">
					<script>
                        function twt_click() {
                            u='http://www.facebook.com/ModifyWatches?sk=app_225058427517861';
                            window.open('http://twitter.com/share?url='+encodeURIComponent(u),'_blank','width=450,height=400'); return false;}
                    </script>
                  	<img src="images/twitter.jpg" style="border:none;cursor:pointer;" onclick="return twt_click()" />
                </div>
            </div>
        </div>
	</div>
  </div> 

  
 </body>
</html>