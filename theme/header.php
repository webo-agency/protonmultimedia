<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Swistak_Theme
 */

 function getPageClassName() {
	$classname;
	if ( is_front_page() ) {
		$classname = 'ks-front-page';
	}
	else {
		$classname = 'ks-page';
	}
	return $classname;
 }

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/swiper.min.css' ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="<?php echo getPageClassName(); ?> site">
	<div class="ks-header" data-header>
		<header id="masthead" class="ks-container site-header">
			
		</header><!-- #masthead -->
	</div>

	<div id="content" class="site-content">
