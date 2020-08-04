<?php
/**
 * protonmultimedia_theme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ProtonMultimedia Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'protonmultimedia_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function protonmultimedia_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Swistak Theme, use a find and replace
		 * to change 'swistak-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'protonmultimedia_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'protonmultimedia-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'protonmultimedia_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'protonmultimedia_theme_setup' );


function protonmultimedia_theme_theme_scripts() {
	wp_enqueue_style( 'protonmultimedia_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'protonmultimedia_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'protonmultimedia_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'protonmultimedia_theme_theme_scripts' );


function proton_theme_styles_and_scripts() {
	wp_register_style('swiper-styles', get_template_directory_uri().'/assets/css/swiper.min.css');
	wp_enqueue_style('swiper-styles');
	wp_register_style('custom-styles', get_template_directory_uri().'/assets/public/dist/css/style.css');
	wp_enqueue_style('custom-styles');
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array (), 1.5, true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/public/dist/js/Main.js', array("swiper"), 1.5, true);
}

add_action('wp_enqueue_scripts', 'proton_theme_styles_and_scripts');


?>