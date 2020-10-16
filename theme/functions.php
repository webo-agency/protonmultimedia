<?php
/**
 * protonmultimedia_theme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ProtonMultimedia Theme
 */

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
				'menu-2' => esc_html__( 'Primary', 'protonmultimedia-theme' ),
				'menu-3' => esc_html__( 'Footer Main', 'protonmultimedia-theme' ),
				'menu-4' => esc_html__( 'Footer Home Services', 'protonmultimedia-theme' ),
				'menu-5' => esc_html__( 'Footer Business Services', 'protonmultimedia-theme' ),
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

		add_image_size( 'slider-block', 9999, 700, true );
		add_image_size( 'slider-block-alternative', 9999, 600, true );
	}
endif;
add_action( 'after_setup_theme', 'protonmultimedia_theme_setup' );


function protonmultimedia_theme_theme_scripts() {
	wp_enqueue_style( 'protonmultimedia_theme-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css') );
	wp_style_add_data( 'protonmultimedia_theme-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'protonmultimedia_theme_theme_scripts' );


function proton_theme_styles_and_scripts() {
	wp_enqueue_style('swiper-styles', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), filemtime(get_template_directory() . '/assets/css/swiper.min.css'), false);
	wp_enqueue_style('all-styles', get_template_directory_uri() . '/assets/css/all.min.css', array(), filemtime(get_template_directory() . '/assets/css/all.min.css'), false);
	wp_enqueue_style('custom-styles', get_template_directory_uri() . '/assets/public/dist/css/style.css', array(), filemtime(get_template_directory() . '/assets/public/dist/css/style.css'), false);
	wp_enqueue_style('custom-styles-tailwind', get_template_directory_uri().'/assets/public/dist/css/index.css', array('custom-styles'), filemtime(get_template_directory() . '/assets/public/dist/css/index.css'), false);

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array (), filemtime(get_template_directory() . '/assets/js/swiper.min.js'), true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/public/dist/js/Main.js', array("swiper"), filemtime( get_template_directory() . '/assets/public/dist/js/Main.js'), true);
	wp_enqueue_script( 'rolldown', get_template_directory_uri() . '/assets/public/dist/js/Rolldown.js', array(), filemtime( get_template_directory() . '/assets/public/dist/js/Rolldown.js'), true);
}

add_action('wp_enqueue_scripts', 'proton_theme_styles_and_scripts');

function proton_theme_add_google_fonts() {
	wp_enqueue_style( 'proton-theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Rajdhani:wght@300;400;500;600;700&display=swap', array(), null );
}
	
add_action( 'wp_enqueue_scripts', 'proton_theme_add_google_fonts' );

add_action( 'wp_head', 'add_viewport_meta_tag' , -999);

function add_viewport_meta_tag() {
		?>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php
}

function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

add_filter( 'wpcf7_load_js', '__return_false' ); 
add_filter( 'wpcf7_load_css', '__return_false' );
