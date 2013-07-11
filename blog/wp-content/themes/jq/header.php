<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&middot;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

  <link rel="stylesheet" type="text/css" href="../css/master.css" /> 

<!-- EXTERNAL LIBRARIES ---------------------------------------------------- --> 

	<!-- Load the lovely jquery library --> 
  <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script> 
 
	<!-- Scripts for clocks --> 
  <!--[if IE]><script type="text/javascript" src="../js/excanvas.js"></script><![endif]--> 
  <script type="text/javascript" src="../js/coolclock.js"></script> 
  <script type="text/javascript" src="../js/moreskins.js"></script> 
 
  <!-- Favicon --> 
  <link REL="SHORTCUT ICON" HREF="../favicon.ico"> 
  
  <!-- Meta data --> 
  <meta name="keywords" content="watches, modify watches, faces, straps, combinations, time keeping, designer watches, swappable, modifiable, flexible, fashionable, dope"> 
  <meta name="description" content="The Modify Watch is flexible fashion. Fashionable. Flexible. Modifiable. Dope.  Use the sandbox to build your own combinations or buy pre-modded packs we've made.">  
 
<!-- Start of PHP code ----------------------------------------------------- -->

<?php 

//Enter the required page height in pixels here
$pageheight =  1500;

include("../includes/background_generator.php"); 

?> 

<!-- End of PHP code ------------------------------------------------------- --> 

<?php
/* This code retrieves all our admin options. */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php /* Style Schemes */
if ($jq_style_scheme == 'Sans-Serif') { ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php } ?>
<?php
if ($jq_style_scheme == 'Serif') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/css/style_serif.css" type="text/css" media="screen" />
<?php } ?>
<?php
if ($jq_style_scheme == 'Dark') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/css/style_dark.css" type="text/css" media="screen" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/icon.png" type="image/png">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/icon.png" type="image/png">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/supersubs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/cookies.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/fontResizer.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/theme.js"></script>

<style type="text/css">
<?php /* Custom font size */
if ($jq_font_size) { ?>    
body {font-size: <?php echo $jq_font_size; ?>px;}               
<?php } ?>
<?php /* Custom bg colour */
if ($jq_bg_color) { ?>    
body {background: <?php echo $jq_bg_color; ?>;}               
<?php } ?>
<?php /* Custom page colour */
if ($jq_page_color) { ?>    
div#content {background: <?php echo $jq_page_color; ?>;}  
div#appendix {background: <?php echo $jq_page_color; ?>;}     
<?php } ?>
<?php /* Sidebar position */
if (!($jq_sidebar_left == "false")) { ?>
div#left {float: right; padding: 10px 0 10px 20px;} 
div#right {float: left; padding: 10px 20px 10px 0;}   
<?php } ?>
</style>

<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
<!-- wp_head -->
<?php wp_head(); ?>
</head>
<body>

<!-- Outer container - change height as appropriate for page -->
<div id='outercontainer'>

  <!-- Start of content container - change height as appropriate for page -->  
  <div id='contentcontainer'>

  <!-- Navigation container --> 
  <div id='navigation'>

    <div id='logo'>
    <a href='../index.php'><img style='margin-left:37px;' src="../images/logo_on_black.gif" alt="Modify Watches" ></a>
    </div>
    <div id='navigationitemsdiv'>
      <ul>
        <li><div style='width:75px;'></div></li>
        <li><div id='navigitem' style='padding-left:10px;'><a href='../buymodify.php'>buy/modify</a></div></li>
        <li><div id='navigitem'><a href='../premodded.php'>pre-modded</a></div></li>
        <li><div id='navigitem'><a href='../howitworks.php'>how it works</a></div></li>        
        <li><div id='navigitem'><a href='../family.php'>modiFamily</a></div></li>
        <li><div id='navigitem'><a href='../everything.php'>everything</a></div></li>
       
        <!-- <li><div id='navigitem'><a href='wholesale.php'>wholesale</a></div></li> -->
        <li><div id='clockdiv' onClick="window.location='secretslogin.php'"><canvas id="splash_clock_face" class="CoolClock:modifyWatch:37"></canvas></div></li>             
      </ul>
    </div>

  </div>
  
	<!-- Title div -->	
	<div id='maintitle'>
    <div id='maintitletext'>the modiblog
    </div>
  </div>				

	<!-- Main content inner div - write in here! -->				
	<div id='maincontentinner' style='width:900px;position:relative;left:37px;'>

<!-- Page content here ----------------------------------------------------- -->


<div id="outline">

<!-- ending header template -->
