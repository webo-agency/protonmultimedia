<?php

function proton_theme_styles_and_scripts() {
	wp_register_style('custom-styles', get_template_directory_uri().'/assets/public/dist/css/style.css');
	wp_enqueue_style('custom-styles');
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array (), 1.5, true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/public/dist/js/Main.js', array("swiper"), 1.5, true);
}

add_action('wp_enqueue_scripts', 'proton_theme_styles_and_scripts');

?>