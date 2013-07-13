<? 
		require ('facebook.php');
		
        $app_id = "215828611782482";
        $app_secret = "ff591c051505abc9c56506b18fcb03f3";
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
<title>Modified Up Video</title>
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

  <div style="height:728px; width:522px;">
	   <?php
        $like_status = $signed_request["page"]["liked"];
		?>
  	<div style="height:522px;width:728px;">
        <div style="height:110px;width:522px;background-image:url('images/header.jpg');"></div>
        <div style="width:522px;height:202px;background-image:url('images/textpiece.jpg');">
        	<div style="position:relative;top:15px;left:35px;width:455px;height:165px;text-align:center;">
            	<span style="font-family: Arial, Helvetica, sans-serif; font-size:25px; color:#22344a; letter-spacing:-1px;">
                	<b>Yes, it's true.</b> Modify Watches <i>does</i> have a music video. A few of our fantastic fans based out of Atlanta,
                    Georgia whipped up this awesome piece of cinematography as a gift. We present to you <b>Modified Up</b>!
                </span>
            </div>
        </div>
        <div style="width:522px;height:359px;background-image:url('images/vidcontent.jpg');">
	   <?php 
        if ($like_status) {
			print"<iframe style=\"position:relative;left:22px;\" width=\"475\" height=\"300\" src=\"http://www.youtube.com/embed/0194zD_PpXU?rel=0\" frameborder=\"0\" allowfullscreen></iframe>";
        }
		else {
			print"<div style=\"position:relative;left:22px;width:475px;height:288px;background-image:url('images/likeus.jpg');\"></div>";
		}
   		?>
        
            <div style="position:relative;left:22px;width:475px;top:5px;height:71px;text-align:center;">
            	<span style="font-family: Arial, Helvetica, sans-serif; font-size:15px; color:#22344a; letter-spacing:-1px;">
                	Many thanks to <b>Carlton Mackey</b>, <b>Joshua Watkins</b>, and <b>Bobby James</b> (the geniuses behind the video) for
                    being such awesome members of our ModiFamily!
                </span>
            </div>
        </div>
        <div style="width:522px;height:57px;background-image:url('images/sharebottom.jpg');">
        	<div style="position:relative;left:255px;top:15px;">
            	<script>
					function fbs_click() {
						u='http://dev.modifywatches.com/facebook/modifiedup/redirected.php';
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
                            u='http://www.facebook.com/ModifyWatches?sk=app_215828611782482';
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