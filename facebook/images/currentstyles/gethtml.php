<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div style="background-image:url('http://dev.modifywatches.com/facebook/images/currentstyles/top.jpg');width:520px;height:88px;"></div>
<div style="background-image:url('http://dev.modifywatches.com/facebook/images/currentstyles/content.jpg');width:520px;height:207px;">
<div style="width:457px;margin:0 auto;">
<p style="font-size:14px;font-family: 'Trebuchet MS', sans-serif;padding-top:15px;">Here at Modify Watches we work hard to make every one of our mods feel loved, respected, and appreciated.  To date we have named over 1,500 watch combos<sup>*</sup>, and here's everything in the current range.</p>
 
<p style="font-size:14px;font-family: 'Trebuchet MS', sans-serif;">Like what you see?  Then head over and <a href='buymodify.php' style="color:#ff7f00;">build your own</a> collection on our site!  (Hint: you can click <b>add all</b> over there to get every single one of these beauties.)</p>
 
<p style="font-size:10px;style="font-family: 'Trebuchet MS', sans-serif;">* may not be entirely accurate.</p> 
</div>
</div>
 
<div style="background-image:url('http://dev.modifywatches.com/facebook/images/currentstyles/bg.jpg');width:520px;height:4800px;background-repeat:repeat-y;"> 
<div style="width:475px;height:4800px;margin:0 auto;">

<?php
//Array to work out names and descriptions of watches
$array = array(
	array("face3strap3","San Francisco Dress Code","Thank god we're open minded in this city, because we can't manage colors to save our life."),
	array("face3strap4","Cruella Deville","Save the dalmations!!!!"),
	array("face3strap5","MST 3000","If you were born after 1990. Or you don't appreciate incredible humor, you wont get this"),
	array("face3strap1","Million Dollar Baby","Nothing like getting punched in the face over and over to help you win an Oscar"),
	array("face3strap6","Arachnaphobia","Remember kids, if your watch has bright colors, it may be poisonous"),
	array("face3strap2","Lawn Ornament","The flamingo is clearly the most underated lawn ornament of all time.  Suck it gnomes."),
	array("face7strap3","Old Faithful","It's always on when you're wearing Black and Silver"),
	array("face7strap4","25 Years","Silver anniversary for you and your lover?  Why not Modify her wrist with a lovely gift?"),
	array("face7strap5","Goldblum","You know you're in store for a great flick if the actor is either (a) Modifying as such or (b) named after the watch"),
	array("face7strap1","Mr. Spock","Helping young men avoid popularity since 1965"),
	array("face7strap6","KungFu Pandamonium","Nothing"),
	array("face7strap2","Grizzled Veteran","If you have any suggestions for a description that ties these colors to that name, email aaron@modifywatches.com"),
	array("face4strap3","Discount Willy","Yeah, we know Shamu was Free Willy, but we can't make a business selling watches for nothing."),
	array("face4strap4","Memoirs of a Geisha","Carry yourself with grace and strum your shimedaiko in style with this tidy color combo."),
	array("face4strap5","Salt and Pepper","With it's your favorite hip hop group, the color of your beard or the spice of your life, it's all good."),
	array("face4strap1","Juneau?","Alaska!"),
	array("face4strap6","Ka-ra-te","One day you'll be a green belt. Maybe even a brown belt. Until that day, wear your cute yellow belt with pride"),
	array("face4strap2","Kid Sister","Looks like she's all grown up. Did you hear that yesterday she rejected my Buddy?"),
	array("face6strap3","Bar Fight","Our most popularly named watch has always been the Bar Fight. So we're bringing it back"),
	array("face6strap4","There's Something About Marriage","Just like our watches - it may seem scary, but you'll love it once you try it out."),
	array("face6strap5","Frowny Face Emoticon","Now you know how I feel"),
	array("face6strap1","El Mago","Don't trust the blue magician. The green guy - Derek - is cool. But beware El Mago"),
	array("face6strap6","Settlers of Catanistan","Why couldn't the same principles behind that amazing board game help solve the war in Afghanistan?"),
	array("face6strap2","Finkle is Einhorn","And Einhorn is Finkle… Think Ace, think!!!"),
	array("face2strap3","Your Fat Uncle","Irish guy.  Good with the gifts.  Never stays too long.  Deserves a watch named after him."),
	array("face2strap4","Lejerk Jabandoner","This is definitely not a reference to a back-stabbing St. Vincent St. Mary graduate who left the Cleve"),
	array("face2strap5","99 problems","But a love of the environment ain't one"),
	array("face2strap1","Totes Magotes","Totally --> Totes --> Totes Magotes."),
	array("face2strap6","Chartreuse","We thought this was a made-up word, but it actually approximates yellow-green!"),
	array("face2strap2","Modifiddle","The devil went down to Georgia looking for a watch to steal…"),
	array("face1strap3","Caped Crusader","Wear this watch and use a slightly deeper voice, and no one will ever know your superhero secret…"),
	array("face1strap4","My Cousin Vineet","We can't wait for the Bollywood version to come out… and we have just the accessory to help you get there on time."),
	array("face1strap5","Dad's Dance Moves","The stomp.  The clap and twist.  Embarrasing at the least, but at least he still gets out there right?"),
	array("face1strap1","Rubicon","Once you wear this modification there's no going back"),
	array("face1strap6","Tall Bird","He's friendly. He's tall. If we call him out by name we probably infringe on a trademark"),
	array("face1strap2","Mixed Signal","If you really loved her, you would have bought red roses. Everyone knows yellow connotes enthusiasm and pink signifies both joy and appreciation."),
	array("face5strap3","The Machine","When you're a champion, you're allowed to be a little weird."),
	array("face5strap4","Red Velvet","Also known as the one treat it's worth consuming even if you're lactose and gluten intolerant"),
	array("face5strap5","Pinky & The Brain","What are we gonna do tonight, Brain?"),
	array("face5strap1","Friends, yes. Benefits, no.","Dude! She doesn't like you. She. Does. Not. Like. You."),
	array("face5strap6","Hipster Ballerina","Just because they're more camouflaged does not mean ballerinas don't exist anymore. We're pretty sure there are emo ballerinas too, we just don't care enough to look for them."),
	array("face5strap2","Amsterdam","People from all over the world travel to the Netherlands because it's the place for tulips"),
	array("face8strap3","Berries","Some like it black. Some like it rasp."),
	array("face8strap4","BadgerBadgerBadger","www.badgerbadgerbadger.com"),
	array("face8strap5","Harry & Hermione","I don't care what you say.  They're meant for each other and some day JK is going to make it happen."),
	array("face8strap1","Inadequate","What's wrong guys? Lonely without Green? Can't make a well-balanced picture? Sad? Miss your friend? Miss old greeny?"),
	array("face8strap6","Swedish Fish","The only good ones are the red ones. You know it and we know it."),
	array("face8strap2","Dimples & Pimples","You don't want too many of either, but more dimples are always preferred.")
);
 
//  $totalCount = count($array);

  for ($i = 0; $i < 48; $i++)
    {
    print("<div style='float:left;padding-left:5px;padding-right:5px;width:145px;height:300px;text-align:center;'>");
    print("<img src='http://dev.modifywatches.com/photos/combos/".$array[$i][0].".JPG' width=145>");
    print("<br><b style='color:#000000;font-family: 'Trebuchet MS', sans-serif;'>". $array[$i][1]."</b>");
    print("<p style='font-size:12px;font-family: 'Trebuchet MS', sans-serif;'>" . $array[$i][2] . "</p>");            
    print("</div>");  
    }
 ?>
</div> 
</div>
<div style="background-image:url('http://dev.modifywatches.com/facebook/images/currentstyles/bottom.jpg');width:520px;height:17px;"></div>
</body>
</html>