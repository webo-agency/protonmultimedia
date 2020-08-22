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

	$sections_path = 'template-parts/layout';
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class('bg-dark-blue'); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="<?php echo is_front_page() ? 'pm-front-page' : 'pm-page'; ?> site relative">

		<?php get_template_part( $sections_path, 'header' ); ?>

		<div id="content" class="site-content">
