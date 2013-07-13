<?php
/**
 * @package WordPress
 * @subpackage CleanMag Theme
 */
$options = get_option( 'cleanmag_theme_settings' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    
<!-- Stylesheet & Favicon -->
<link rel="icon" type="image/png" href="https://dev.modifywatches.com/product_images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="http://dev.modifywatches.com/blog/wp-content/themes/cleanmag/style.css" />
<link rel="stylesheet" type="text/css" href="https://dev.modifywatches.com/templates/Modify/Styles/default.css" />
<link rel="stylesheet" type="text/css" href="https://dev.modifywatches.com/templates/Modify/Styles/styles.css" />

<!-- WP Head -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<script type="text/javascript" charset="utf-8">
jQuery(function($){
	$(document).ready(function(){
	// superFish
	$('ul.sf-menu').supersubs({
		minWidth:    16, // minimum width of sub-menus in em units
		maxWidth:    40, // maximum width of sub-menus in em units
		extraWidth:  1 // extra width can ensure lines don't sometimes turn over
     })
    	.superfish(); // call supersubs first, then superfish
	});
});
</script>
<?php if(is_front_page()) { ?>
<script type="text/javascript">
jQuery(function($){
	$(document).ready(function(){  
	$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);  
});
});
</script>
<?php } ?>
<?php 
// Get And Show Analytics Code 
echo stripslashes($options['analytics']); 
?>

</head>
<body <?php body_class($class); ?>>

<header id="top" class="fncysans wShad" style="margin-bottom:20px;">
	<div id="header" style="margin-top:0px;position:relative;">
		<div id="contentwrap">
			<div class="headcontent">
				<div id="logo">
					<div class="pad"></div>
					<a href="http://dev.modifywatches.com"></a>
				</div>
				<div id="nav">
					<nav id="topLinks">
						<ul>
							<li class="shipping">Free Shipping on Orders Over $60</li>
							<li><a class="eSubscribe" href="#">Subscribe to Newsletter</a></li>
							<!--<li><a href="#">Earn Free Mods</a></li>-->
							<li><a href="http://dev.modifywatches.com/login.php"><span class="acc">Login / Sign Up</span></a> </li>
						</ul>
					</nav>
					<iframe id="headerFB" src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fmodifywatches&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=198063910254631" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:21px;margin-top:4px;float:right;" allowtransparency="true"></iframe>
					<nav id="mainLinks">
						<ul>
							<li id="navShopOuter" class="">
								<a id="navShop" href="http://dev.modifywatches.com/categories?a=build">Shop</a>
								<div class="sDrop">
									<ul>
										<li>
											<a href="http://dev.modifywatches.com/categories?a=build">
												<img src="http://dev.modifywatches.com/templates/Modify/images/default/builddrop2.jpg" style="
												display: block;
												margin-bottom: 5px;">
												<span class="fncyBlanche">Create</span>
												<span class="copy">Start From Scratch &gt;</span>
											</a>
										</li>
										<li>
											<a href="http://dev.modifywatches.com/sets.php">
												<img src="http://dev.modifywatches.com/templates/Modify/images/default/browsedrop2.jpg" style="
												display: block;
												margin-bottom: 5px;">
												<span class="fncyBlanche">Browse</span>
												<span class="copy">Curated Sets &gt;</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class=""><a id="navAbout" href="http://dev.modifywatches.com/about.php">About</a></li>
							<li class=""><a id="navComm" href="http://dev.modifywatches.com/community.php">Community</a></li>
							<!--<li><a id="navSupport" href="#"><span class="icon"></span>Support</a><span class="divide"></span></li> -->
						</ul>
				</div>
			</div>
		</div>
		
		<div id="leftwrap">
			<div id="lside">
			</div>
		</div>
		<div id="rightwrap">
			<div id="rside">
			</div>            
		</div>
		
		<div style="clear:both;"></div>
	</div>
	<div style="clear:both;"></div>
</header>

<div id="wrap" class="container_24 clearfix">
    <div id="navigation" class="clearfix">
                <?php
                //define main navigation
                wp_nav_menu( array(
                    'theme_location' => 'main nav',
                    'sort_column' => 'menu_order',
                    'menu_class' => 'sf-menu',
                    'fallback_cb' => 'default_menu'
                )); ?>
    </div><!-- END navigation -->   
    
    <?php if(is_front_page()) { 
            $feature_query = new WP_Query('showposts=4&post_type=slides');	 
            if ($feature_query->have_posts()) :
        ?>
   	<div id="featured">
        
        <ul class="ui-tabs-nav">
        <?php
		$count=0;
        while ($feature_query->have_posts()) : $feature_query->the_post();$do_not_duplicate = $post->ID;
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
		$count++;
         ?>	
        
        <li class="ui-tabs-nav-item ui-tabs-selected clearfix" id="nav-fragment-<?php the_ID(); ?>">
        <a href="#fragment-<?php the_ID(); ?>" <?php if($count=='4') { echo 'class="remove-border"'; } ?>>
		<?php the_post_thumbnail('image-thumb'); ?>      
        <p><?php the_title(); ?></p>
        </a></li>
        <?php endwhile; ?>
        
        </ul>
        <?php endif; ?>
        
        
        <?php if ($feature_query->have_posts()) :?>
        <?php
        while ($feature_query->have_posts()) : $feature_query->the_post();$do_not_duplicate = $post->ID;
        // get metabox data
        $slidelink = get_post_meta($post->ID, 'slides_url', TRUE);
		?>	
        
        <div id="fragment-<?php the_ID(); ?>" class="ui-tabs-panel" style="">
        
        <?php if($slidelink !='') { ?>
		<a href="<?php echo $slidelink; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
		<?php } else { ?>
        <?php the_post_thumbnail('post-image'); ?>
		<?php } ?>
        
        <div class="info">
        	<?php if($slidelink !='') { ?>
       		<a href="<?php echo $slidelink; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            <?php } else { ?>
            <?php the_title(); ?>
            <?php } ?>
        </div>
        <!-- END info -->
        </div>
        <!-- END fragment -->
        
        <?php endwhile ?>
        </div>
        <?php endif; ?>
        <!-- END featured -->
		<?php } ?>

<div id="main" class="container_24">