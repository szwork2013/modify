<? 
		require_once ('facebook.php');
		
        $app_id = "268363423204667";
        $app_secret = "3a1745dab1739448ca27e56f7e7c6000";
        $facebook = new Facebook(array(
        'appId' => $app_id,
        'secret' => $app_secret,
		'cookies' => true,
        ));
		
        $signed_request = $facebook->getSignedRequest();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Watches - Modify on Location</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<style type="text/css">
  	.haikubox {
		text-align:center;
		width:210px;
		height:300px;
		padding:10px;
		font-family: Arial, Helvetica, sans-serif;	
		border:solid 1px #ebebeb;
		margin-right:8px;
		margin-bottom:5px;
		float:left;
	}
	
	.haikuname {
		color:#465761;
		padding-bottom:4px;
		border-bottom:solid 1px #465761;
		font-size:18px;
	}
	
	.haikutext {
		color:#000;
		padding:10px;
		border-bottom:solid 1px #465761;	
		font-weight:bold;
		font-size:14px;
	}
	
	.haikuvote {
		margin-top:8px;
		color:#000;
		font-size:14px;	
	}
	
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		textarea.text {margin-bottom:12px; width:95%; padding: .4em;}
		input#subscribe {display:inline; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent;}
  </style>
</head>

<?php
	$dbhost = 'localhost';
	$dbuser = 'modiwatc_fb';
	$dbpass = 'Oski2010!';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');
	
	$dbname = 'modiwatc_facebook';
	mysql_select_db($dbname, $conn) or die ("Can't select database.");
	
	$query = "SELECT * FROM location"; 
	 
	$result = mysql_query($query) or die(mysql_error());
?>

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
<link rel="stylesheet" href="landingpage.css" type="text/css" />
 
  <div style="height:728px; width:522px;">

  	<div style="height:522px;width:728px;">
        <div style="height:284px;width:522px;background-image:url('header.jpg');float:left;"></div>
        <div style="width:522px;float:left;background-image:url('bg.jpg');background-repeat:repeat-y;">
        	<div style="margin-left:24px;" id="haikuholder">
            	<? while($row = mysql_fetch_array($result)){ ?>
                <div class="haikubox">
                    <div class="haikuname"><? echo $row['name'] ?>:</div>
                    <div class="haikutext">
                    	<?
							list($width, $height, $type, $attr) = getimagesize("photos/" . $row['photoloc']);
							
							if ($width > $height) {
								$css = "width: 190px;";	
							}
							else {
								$css = "height:210px;";
							}
							
						?>
                       <a href="photos/<? echo $row['photoloc'] ?>" target="_blank"><img src="photos/<? echo $row['photoloc'] ?>" style="<? echo $css; ?>"/></a>
                    </div>
                    <div class="haikuvote">
                        <img src="vote.png" id="<? echo $row['ID'] ?>" style="cursor:pointer;" class="vote" /> <span style="position:relative;top:-8px;font-weight:bold;">| <span class="voteNum" title="<? echo $row['ID'] ?>"><? echo $row['votes'] ?></span> votes</span>
                    </div>
                </div>
				<? } ?>
             </div>
        </div>
        
        <div style="width:522px;height:57px;background-image:url('sharebottom.jpg');float:left;">
        	<div style="position:relative;left:255px;top:15px;">
            	<script>
					function fbs_click() {
						u='http://www.facebook.com/ModifyWatches?sk=app_268363423204667';
						window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(title),'_blank','width=450,height=400'); return false;}
				</script>
				<a href="http://www.facebook.com/share.php?u=http://www.facebook.com/ModifyWatches?sk=app_268363423204667" onclick="return fbs_click()" target="_blank">
					<img src="posttowall.jpg" alt="Share on Facebook" />
				</a>
            </div>
            <div style="position:relative;left:413px;top:-12px;">
                <div style="width:27px;height:27px;">
					<script>
                        function twt_click() {
                            u='http://www.facebook.com/ModifyWatches?sk=app_268363423204667';
                            window.open('http://twitter.com/share?url='+encodeURIComponent(u),'_blank','width=450,height=400'); return false;}
                    </script>
                  	<img src="twitter.jpg" style="border:none;cursor:pointer;" onclick="return twt_click()" />
                </div>
            </div>
        </div>
	</div>
    <div style="color:#000;font-size:12px;width:400px;margin:10px auto;">If you participate in this promotion, you will only be providing information to Modify Watches and not to Facebook.  You release Facebook of any liability associated with the promotion and acknowledge the promotion is in no way sponsored, endorsed or administered by, or associated with Facebook.  </div>

  </div> 
<script type="text/javascript">
$(document).ready(function() {			
	$(".vote").click(function() {
		var id = $(this).attr( 'ID' );
		var currentVotes = $(".voteNum[title=" + id + "]").html();
		$.post('vote.php', { id: id }, function(data) {
			if (data == "1") {
				$(".voteNum[title=" + id + "]").fadeOut(500).html((parseInt(currentVotes) + 1)).fadeIn(500);
			}
		});
	});
});
</script>
  
 </body>
</html>