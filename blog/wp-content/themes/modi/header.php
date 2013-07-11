<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php include("../includes/libraries.php"); ?> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="http://www.modifywatches.com/css/master.css" />
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<?php $pagename="blog"; ?>

<body <?php body_class(); ?>>
      <div id='outercontainer'>


      <!-- Navigation container --> 
      <div id='navigation'>
    
        <div id='navigation'>

        <div id='logo'>
        <a href='index.php'><img style='margin-left:37px;' src="../images/logo_on_white.gif" alt="Modify Watches" ></a>
        </div>
        <div id='navigationitemsdiv' style='position:relative;left:-80px;width:725px;'>
          <ul>
            <li><div style='width:55px;'></div></li>
            <li><div id='navigitem' style='padding-left:0px;'><a href='../getstarted.php' <?php if ($pagename=="getstarted") echo "style='color:#8fcb47'"; ?>>get started</a></div></li>
            <li><div id='navigitem'><span style="font-size:18px;color:#455560;">|</span></div></li>  
            <!-- <li><div id='navigitem'><a href='expand.php'  <?php if ($pagename=="expand") echo "style='color:#8fcb47'"; ?>>expand</a></div></li> -->
            <li><div id='navigitem'><a href='../sandbox.php' <?php if ($pagename=="sandbox") echo "style='color:#8fcb47'"; ?>>build your own</a></div></li>  
            <li><div id='navigitem'><span style="font-size:18px;color:#455560;">|</span></div></li>  
            <li><div id='navigitem'><a href='../howitworks.php' <?php if ($pagename=="howitworks") echo "style='color:#8fcb47'"; ?>>how it works</a></div></li>        
            <li><div id='navigitem'><span style="font-size:18px;color:#455560;">|</span></div></li>  
            <li><div id='navigitem'><a href='../family.php' <?php if ($pagename=="family") echo "style='color:#8fcb47'"; ?>>family</a></div></li>
            <li><div id='navigitem'><span style="font-size:18px;color:#455560;">|</span></div></li>  
            <li><div id='navigitem'><a href='../about.php' <?php if ($pagename=="aboutus") echo "style='color:#8fcb47'"; ?>>about us</a></div></li>
            <li><div id='navigitem'><span style="font-size:18px;color:#455560;">|</span></div></li>  
            <li><div id='navigitem'><a href='index.php' <?php if ($pagename=="blog") echo "style='color:#8fcb47'"; ?>>blog</a></div></li>
            <!-- <li><div id='navigitem'><a href='everything.php' <?php if ($pagename=="everything") echo "style='color:#8fcb47'"; ?>>everything</a></div></li> -->
           
            <!-- <li><div id='navigitem'><a href='wholesale.php'>wholesale</a></div></li> -->
            <li><div id='clockdiv' onClick="window.location='../secretslogin.php'"><canvas id="splash_clock_face" class="CoolClock:modifyWatch:37"></canvas></div></li>             
          </ul>
        </div>
    
      </div>
      </div>
      <div id='contentcontainer'>

     <div id='innercontenttitle'>
        <div id='innercontenttitletext'>
        <font style='color:#fff;'>blog</font>     
        </div>
     </div>  
     
	<div id='innercontentcontainer'>

