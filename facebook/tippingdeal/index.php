<? 
		require ('facebook.php');
		
        $app_id = "238214236199634";
        $app_secret = "5910680b1865d6b99d622278936dc874";
        $facebook = new Facebook(array(
        'appId' => $app_id,
        'secret' => $app_secret,
        'cookie' => true
        ));
		
        $signed_request = $facebook->getSignedRequest();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tipping Deal</title>
</head>

<body style="overflow:hidden;">
<link rel="stylesheet" href="landingpage.css" type="text/css" />
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

  <style type="text/css">
  	.dealBox {
		width:474px;
		height:352px;
		position:relative;
		float:left;
		left:22px;
		top:4px;
		text-align:center;	
		border:1px solid #464646;
		background-image:url("images/opaquebg.png");
		background-repeat:repeat;
		margin-top:15px;
	}
	
	.dealBox .image {
		width:107px;
		height:140px;
		position:relative;
		float:left;
		margin-left:8px;
		border: 1px solid #464646;
		margin-top:8px;
	}
	
	.dealBox .title {
		position:relative;
		float:left;
		width:338px;
		height:48px;
		border:1px solid #6a6a6a;
		margin-left:6px;	
		background-color:#eaeaea;
		text-align:left;
		padding-left:5px;
		margin-top:8px;
	}
	
	.boldGrey {
		color:#656565;
		font-size:20px;	
		font-weight:bold;
	}
	
	.titlePurple {
		color:#5f2bb3;
		font-size:20px;	
		font-weight:bold;
	}
	
	.info {
		width:210px;
		height:85px;
		margin-top:5px;
		position:relative;
		float:left;
		margin-left:6px;
		text-align:left;
	}
	
	.buy {
		width:140px;
		height:50px;
		position:relative;
		float:right;
		margin-top:12px;
	}
	
	.photo {
		width:456px;
		height:187px;
		border: 1px solid #6a6a6a;
		margin-left:8px;
		margin-top:6px;
		float:left;	
	}
	
	.tippingInfo {
		width:210px;
		height:22px;
		background-image:url("images/purplebg.jpg");
		background-repeat:repeat-y;
		margin-top:3px;
		color:#FFF;
		text-align:left;	
		padding-left:5px;
		padding-top:2px;
	}
  </style>

  <div style="height:840px; width:522px;">
  		<div style="width:522px;height:292px;background-image:url('images/header.jpg');"></div>
        <div style="width:522px;height:1200px;background-image:url('images/bg.jpg');background-repeat:repeat-y;">
        	<div class="dealBox">
            	<div class="image">
                	<img src="images/sean.jpg" />
                </div>
                <div class="title">
                	<span class="boldGrey">Deal 1</span><br />
                    <span class="titlePurple">Sean 'Accenting my Tan' Linehan:</span>	
                </div>
                <div class="info">
                	1 face + 2 straps<br />
                    <span class="titlePurple" style="font-size:inherit;font-style:italic;">+1 surprise piece</span> = <b>pure joy</b>
                    <div class="tippingInfo">
                    	We still need 26 peeps to tip!
                    </div>
                </div>	
                <div class="buy">
                	<span style="font-size:30px;font-weight:bold;">$30</span>		
                <form action="https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/126816192993373" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm" target="_top">
                    <input name="item_name_1" type="hidden" value="Tipping Deal 1"/>
                    <input name="item_description_1" type="hidden" value="Brown Strap, Charcoal Strap, Bronze Face.&#xa;** YOU WILL ONLY BE CHARGED IF THE DEAL TIPS **"/>
                    <input name="item_quantity_1" type="hidden" value="1"/>
                    <input name="item_price_1" type="hidden" value="30.0"/>
                    <input name="item_currency_1" type="hidden" value="USD"/>
                    <input name="_charset_" type="hidden" value="utf-8"/>
                    <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=126816192993373&amp;w=117&amp;h=48&amp;style=trans&amp;variant=text&amp;loc=en_US" type="image"/>
                </form>
                </div>
                <div class="photo">
                	<img src="images/deal1photo.jpg" />
                </div>
            </div>
            <div style="float:left;width:100%;text-align:center;margin-top:9px;color:#343434;font-size:20px;font-wieght:bolder;">
            We will process your card only if the deal tips.
            </div>
            <div class="dealBox">
            	<div class="image">
                	<img src="images/ashil.jpg" />
                </div>
                <div class="title">
                	<span class="boldGrey">Deal 2</span><br />
                    <span class="titlePurple">Ashil 'Buckhuter' Parag:</span>	
                </div>
                <div class="info">
                	1 face + 2 straps<br />
                    <span class="titlePurple" style="font-size:inherit;font-style:italic;">+1 surprise piece</span> = <b>pure jubilee</b>
                    <div class="tippingInfo">
                    	We still need 29 peeps to tip!
                    </div>
                </div>	
                <div class="buy">
                	<span style="font-size:30px;font-weight:bold;">$30</span>		
                <form action="https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/126816192993373" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm" target="_top">
                    <input name="item_name_1" type="hidden" value="Tipping Deal 2"/>
                    <input name="item_description_1" type="hidden" value="Black Strap, Forest Green Strap, Orange Face.&#xa;** YOU WILL ONLY BE CHARGED IF THE DEAL TIPS **"/>
                    <input name="item_quantity_1" type="hidden" value="1"/>
                    <input name="item_price_1" type="hidden" value="30.0"/>
                    <input name="item_currency_1" type="hidden" value="USD"/>
                    <input name="_charset_" type="hidden" value="utf-8"/>
                    <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=126816192993373&amp;w=117&amp;h=48&amp;style=trans&amp;variant=text&amp;loc=en_US" type="image"/>
                </form>
                </div>
                <div class="photo">
                	<img src="images/deal2photo.jpg" />
                </div>
            </div>
            <div style="float:left;width:100%;text-align:center;margin-top:9px;color:#343434;font-size:20px;font-wieght:bolder;">
            We will process your card only if the deal tips.
            </div>
        	<div class="dealBox">
            	<div class="image">
                	<img src="images/liz.jpg" />
                </div>
                <div class="title">
                	<span class="boldGrey">Deal 3</span><br />
                    <span class="titlePurple">Liz 'Christmas in July' Callahan:</span>	
                </div>
                <div class="info">
                	2 faces + 3 straps<br />
                    <span class="titlePurple" style="font-size:inherit;font-style:italic;">+1 surprise piece</span> = <b style="font-size:14px;">pure ecstacy</b>
                    <div class="tippingInfo">
                    	We still need 26 peeps to tip!
                    </div>
                </div>	
                <div class="buy">
                	<span style="font-size:30px;font-weight:bold;">$50</span>		
                <form action="https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/126816192993373" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm" target="_top">
                    <input name="item_name_1" type="hidden" value="Tipping Deal 3"/>
                    <input name="item_description_1" type="hidden" value="Forest Green Strap, Charcoal Strap, Blue Strap, Orange Face, Bronze Face.&#xa;** YOU WILL ONLY BE CHARGED IF THE DEAL TIPS **"/>
                    <input name="item_quantity_1" type="hidden" value="1"/>
                    <input name="item_price_1" type="hidden" value="50.0"/>
                    <input name="item_currency_1" type="hidden" value="USD"/>
                    <input name="_charset_" type="hidden" value="utf-8"/>
                    <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=126816192993373&amp;w=117&amp;h=48&amp;style=trans&amp;variant=text&amp;loc=en_US" type="image"/>
                </form>
                </div>
                <div class="photo">
                	<img src="images/deal3photo.jpg" />
                </div>
            </div>
        </div>
        <div style="width:522px;height:57px;background-image:url('images/sharebottom.jpg');position:relative;float:left;top:-20px;">
        	<div style="position:relative;left:255px;top:15px;">
            	<script>
					function fbs_click() {
						u='http://www.modifywatches.com/facebook/tippingdeal/share.php';
						title='Modify Watches Tipping Deal';
						window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(title),'_blank','width=450,height=400'); return false;}
				</script>
				<a href="http://www.facebook.com/share.php?u=http://www.modifywatches.com/" onclick="return fbs_click()" target="_blank">
					<img src="images/posttowall.jpg" alt="Share on Facebook" />
				</a>
            </div>
            <div style="position:relative;left:413px;top:-12px;">
                <div style="width:27px;height:27px;">
					<script>
                        function twt_click() {
                            u='http://www.facebook.com/ModifyWatches?sk=app_238214236199634';
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