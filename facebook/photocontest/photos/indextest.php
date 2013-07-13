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

  <div style="height:830px; width:522px;">
  		<div style="width:522px;height:276px;background-image:url('images/contestinfohead.jpg');"></div>
        <div style="width:522px;height:1000px;background-image:url('images/background.jpg');background-repeat:repeat-y;">
        	<div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:190px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/KathrynT.jpg"><img src="photos/KathrynT.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Kathryn Tomaka</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/KathrynT.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:190px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/StaceyB.jpg"><img src="photos/StaceyB.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Stacey Berry</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/StaceyB.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:3700px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/MarthaM.jpg"><img src="photos/MarthaM.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Martha Martinez</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/MarthaM.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:170px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/DubProof.jpg"><img src="photos/DubProof.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Dub Proof</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/DubProof.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:333px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/DjModify.jpg"><img src="photos/DjModify.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Jeffrey Aspland</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/DjModify.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:333px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/CindyThrasher.jpg"><img src="photos/CindyThrasher.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Cindy Thrasher</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/CindyThrasher.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:335px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/ChadB.jpg"><img src="photos/ChadB.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Chad Bowman</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/ChadB.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>
            <div style="width:475px;position:relative;left:22px;top:4px;border-top:2px solid #f0d35b;">
            	<div style="width:250px;height:375px;border: 3px #ebebeb;position:relative;top:5px;left:2px;float:left;">
                	<a href="photos/AlliR.jpg"><img src="photos/AlliR.jpg" width="250px" style="border:none;" /></a>
                </div>
                <div style="float:left;width:179px;height:132px;background-image:url('images/voteboxborder.gif');position:relative;top:35px;left:20px;">
                	<div style="position:relative;left:10px;top:15px;">
                    	<span style="font-size: 15px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Submitted By:</span><br />
                        <span style="font-size: 22px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">Alli Royce Soble</span><br /><br />
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=159118097489884&amp;xfbml=1"></script><fb:like href="http://modifywatches.com/facebook/photocontest/photos/AlliR.jpg" send="true" layout="button_count" width="160" show_faces="false" font=""></fb:like>
                        <span style="font-size: 10px; font-family: Tahoma, Geneva, sans-serif; color: #465761;">(Click Like to Vote)</span>
                </div>
            </div>

        </div>
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