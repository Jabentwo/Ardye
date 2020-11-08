<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Akina
 */
?>
<?php header('X-Frame-Options: SAMEORIGIN'); ?>
<!DOCTYPE html>
<!-- 
Theme by Mashiro
                      /^--^\     /^--^\     /^--^\
                      \____/     \____/     \____/
                     /      \   /      \   /      \
                    |        | |        | |        |
                     \__  __/   \__  __/   \__  __/
|^|^|^|^|^|^|^|^|^|^|^|^\ \^|^|^|^/ /^|^|^|^|^\ \^|^|^|^|^|^|^|^|^|^|^|^|
| | | | | | | | | | | | |\ \| | |/ /| | | | | | \ \ | | | | | | | | | | |
########################/ /######\ \###########/ /#######################
| | | | | | | | | | | | \/| | | | \/| | | | | |\/ | | | | | | | | | | | |
|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|_|

-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="referrer" content="same-origin">

<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<title itemprop="name"><?php global $page, $paged;wp_title( '-', true, 'right' );
bloginfo( 'name' );$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) echo " - $site_description";if ( $paged >= 2 || $page >= 2 ) echo ' - ' . sprintf( __( 'page %s ','sakura'), max( $paged, $page ) );/*第 %s 页*/?>
</title>
<?php
if (akina_option('akina_meta') == true) {
	$keywords = '';
	$description = '';
	if ( is_singular() ) {
		$keywords = '';
		$tags = get_the_tags();
		$categories = get_the_category();
		if ($tags) {
			foreach($tags as $tag) {
				$keywords .= $tag->name . ','; 
			};
		};
		if ($categories) {
			foreach($categories as $category) {
				$keywords .= $category->name . ','; 
			};
		};
		$description = mb_strimwidth( str_replace("\r\n", '', strip_tags($post->post_content)), 0, 240, '…');
	} else {
		$keywords = akina_option('akina_meta_keywords');
		$description = akina_option('akina_meta_description');
	};
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">

<link rel="shortcut icon" href="<?php echo akina_option('favicon_link', ''); ?>"/> 
<meta name="theme-color" content="#31363b">
<meta http-equiv="x-dns-prefetch-control" content="on">
<?php wp_head(); ?>

<?php if (is_single() || is_page()) {
    $head = get_post_meta($post->ID, 'head', true); 
    if (!empty($head)) { ?> 
        <?php echo $head; ?> 
<?php } } ?>

<script type="text/javascript">
if (!!window.ActiveXObject || "ActiveXObject" in window) { //is IE?
  alert('朋友，IE浏览器未适配哦~\n如果是 360、QQ 等双核浏览器，请关闭 IE 模式！');
}
</script>
<?php if(akina_option('google_analytics_id', '')):?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo akina_option('google_analytics_id', ''); ?>"></script>
<script>
window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','<?php echo akina_option('google_analytics_id', ''); ?>');
</script>
<?php endif; ?>
</head>
<body <?php body_class(); ?>>
	<div class="scrollbar" id="bar"></div>
	<section id="main-container">
		<?php 
		if(!akina_option('head_focus')){ 
		$filter = akina_option('focus_img_filter');
		?>
		<div class="headertop <?php echo $filter; ?>">
				 <div id="banner_wave_1"></div> 
            <div id="banner_wave_2"></div>
			<?php get_template_part('layouts/imgbox'); ?>
		</div>	
	
		<?php } ?>
		<div id="page" class="site wrapper">
			<!-- <header class="site-header no-select" role="banner">-->
			<header class="site-header no-select is-homepage gizle sabit" role="banner">
				<div class="site-top">
					<div class="site-branding">
						<?php if (akina_option('akina_logo')){ ?>
						<div class="site-title">
							<a href="<?php bloginfo('url');?>" ><img src="<?php echo akina_option('akina_logo'); ?>"></a>
						</div>
						<?php }else{ ?>
						<span class="site-title">
							<!--<span class="logolink serif">-->
							<span class="logolink moe-mashiro">	
								<a href="<?php bloginfo('url');?>">
									<!--<span class="site-name"><?php echo akina_option('site_name', ''); ?></span>-->
						<ruby>							
	                    <span class="sakuraso">多彩</span>	
	                    <span class="no">の</span>	
	                    <span class="shironeko">每一天</span>	
	                    <rp></rp>								
	                    <rt class="chinese-font">Ardye's Life</rt>					<rp></rp>						
	                    </ruby>				
									
								</a>
							</span>
						</span>	
						<?php } ?><!-- logo end -->
					</div><!-- .site-branding -->
					<?php header_user_menu(); if(akina_option('top_search') == 'yes') { ?>
					<div class="searchbox"><i class="iconfont js-toggle-search iconsearch icon-search"></i></div>
					<?php } ?>
					<div class="lower"><?php if(!akina_option('shownav')){ ?>
						<div id="show-nav" class="showNav">
							<div class="line line1"></div>
							<div class="line line2"></div>
							<div class="line line3"></div>
						</div><?php } ?>
						<nav><?php wp_nav_menu( array( 'depth' => 2, 'theme_location' => 'primary', 'container' => false ) ); ?></nav><!-- #site-navigation -->
					</div>	
				</div>
			</header><!-- #masthead -->
			<?php if (get_post_meta(get_the_ID(), 'cover_type', true) == 'hls') {
                the_video_headPattern_hls();
            } elseif (get_post_meta(get_the_ID(), 'cover_type', true) == 'normal') { 
                the_video_headPattern_normal();
            }else {
                the_headPattern();
            } ?>
		    <div id="content" class="site-content">
			
	<!-- 增加图片放大效果		
	<body onLoad="setupZoom();">
	
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js-global/FancyZoom.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js-global/FancyZoomHTML.js"></script>-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
