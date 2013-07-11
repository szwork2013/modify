<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Agile Carousel: Downloadable Example</title>
		<link rel="stylesheet" type="text/css" href="carousel.css">
	</head>
<body>

<h1>Agile Carousel: JQuery Carousel Plugin</h1>
<p class="sub">Beta 2.1 Example</p>

<div id="slide_holder"><img class="loading" src="images/ajax_loader.gif" alt=""></div><!-- slide_holder -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script src="carousel_behavior_min.js"></script>
<script type="text/javascript">
$('#slide_holder').agile_carousel({
path_to_slides: "agile_carousel_slides",
slide_directory: "agile_carousel_slides",
next_prev_buttons: "no"
});
</script>

</div>
	

</body>
</html>