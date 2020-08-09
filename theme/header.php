<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProtonMultimedia_Theme
 */

 function getPageClassName() {
	$classname;
	if ( is_front_page() ) {
		$classname = 'pm-front-page';
	}
	else {
		$classname = 'pm-page';
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
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/swiper.min.css' ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/css/all.min.css' ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="<?php echo getPageClassName(); ?> site">
	<div class="pm-header" data-header>
		<header id="masthead" class="pm-container pm-container--indented site-header">
			<div class="site-branding site-branding--mobile">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->
			<button class="menu-toggle pm-menu-toggler" aria-controls="primary-menu" aria-expanded="false">
				<span class="pm-util-sr-only">Menu</span>
				<div class="pm-menu-toggler__line"></div>
				<div class="pm-menu-toggler__line"></div>
				<div class="pm-menu-toggler__line"></div>
			</button>
			<nav id="site-navigation" class="main-navigation">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
				<a class="pm-button pm-button--primary pm-button--small" href="#kontakt">Skontaktuj się</a>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div>

	<div id="content" class="site-content">
