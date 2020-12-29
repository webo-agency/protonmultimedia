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
		 * If you're building a theme based on Protonmultimedia Theme, use a find and replace
		 * to change 'protonmultimedia-theme' to the name of your theme in all the template files.
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


function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'new_excerpt_length');


function wporg_block_wrapper( $block_content, $block ) {

	$content = '<div class="mx-auto max-w-900px">';
	$content .= $block_content;
	$content .= '</div>';

	if ( $block['blockName'] === 'core/image' ) {
			$content = '<div class="mx-auto w-auto max-w-full">';
			$content .= $block_content;
			$content .= '</div>';
			return $content;
	}

	if ( $block['blockName'] === 'core/social-link' ) {
		return $block_content;
	}
	
	return $content;
}

add_filter( 'render_block', 'wporg_block_wrapper', 10, 2 );


function proton_allowed_block_types( $allowed_block_types, $post ) {
	return array(
	//	'core/archives',
	//	'core/audio',
	//	'core/button',
	//	'core/categories',
	//	'core/code',
	//	'core/column',
	//	'core/columns',
		'core/coverImage',
		'core/embed',
		'core/file',
	//	'core/freeform',
		'core/gallery',
		'core/heading',
	//	'core/html',
		'core/image',
	//	'core/latestComments',
	//	'core/latestPosts',
		'core/list',
		'core/more',
	//	'core/nextpage',
		'core/paragraph',
		'core/preformatted',
		'core/pullquote',
		'core/quote',
		'core/reusableBlock',
		'core/separator',
		'core/shortcode',
	//	'core/spacer',
		'core/subhead',
		'core/table',
		'core/textColumns',
		'core/social-link',
	//	'core/verse',
		'core/video',
	);
}

add_filter( 'allowed_block_types', 'proton_allowed_block_types', 10, 2 );



function remove_h1_from_heading($args) {
	// Just omit h1 from the list
	$args['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
	return $args;
}
add_filter('tiny_mce_before_init', 'remove_h1_from_heading' );





/* SVG Social Icons */
/**
 * Server-side rendering of the `core/social-link` blocks.
 *
 * @package WordPress
 */

/**
 * Renders the `core/social-link` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Rendered HTML of the referenced block.
 */
function custom_render_block_core_social_link( $attributes ) {
	$service    = ( isset( $attributes['service'] ) ) ? $attributes['service'] : 'Icon';
	$url        = ( isset( $attributes['url'] ) ) ? $attributes['url'] : false;
	$label      = ( isset( $attributes['label'] ) ) ? $attributes['label'] : custom_block_core_social_link_get_name( $service );
	$class_name = isset( $attributes['className'] ) ? ' ' . $attributes['className'] : false;

	// Don't render a link if there is no URL set.
	if ( ! $url ) {
		return '';
	}

	$icon = custom_block_core_social_link_get_icon( $service );
	return '<li class="wp-social-link wp-social-link-' . esc_attr( $service ) . esc_attr( $class_name ) . '"><a href="' . esc_url( $url ) . '" aria-label="' . esc_attr( $label ) . '"> ' . $icon . '</a></li>';
}

/**
 * Override the `core/social-link` blocks.
 */
function custom_register_block_core_social_link() {
	// Get instance of the block
	$block = WP_Block_Type_Registry::get_instance()->get_registered( 'core/social-link' );
	// Change render callback
	$block->render_callback = 'custom_render_block_core_social_link';
    // Unregister first to avoid warning
	unregister_block_type( 'core/social-link' );
	// Reregister
	register_block_type( $block );
}

add_action( 'init', 'custom_register_block_core_social_link' );


/**
 * Returns the SVG for social link.
 *
 * @param string $service The service icon.
 *
 * @return string SVG Element for service icon.
 */
function custom_block_core_social_link_get_icon( $service ) {
	$services = custom_block_core_social_link_services();
	if ( isset( $services[ $service ] ) && isset( $services[ $service ]['icon'] ) ) {
		return $services[ $service ]['icon'];
	}

	return $services['share']['icon'];
}

/**
 * Returns the brand name for social link.
 *
 * @param string $service The service icon.
 *
 * @return string Brand label.
 */
function custom_block_core_social_link_get_name( $service ) {
	$services = custom_block_core_social_link_services();
	if ( isset( $services[ $service ] ) && isset( $services[ $service ]['name'] ) ) {
		return $services[ $service ]['name'];
	}

	return $services['share']['name'];
}

/**
 * Returns the SVG for social link.
 *
 * @param string $service The service slug to extract data from.
 * @param string $field The field ('name', 'icon', etc) to extract for a service.
 *
 * @return array|string
 */
function custom_block_core_social_link_services( $service = '', $field = '' ) {
	$services_data = array(
		'facebook'      => array(
			'name' => 'Facebook',
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M0 0h60v60H41.426V36.797h7.822l1.172-9.082h-8.994v-5.784c0-2.624.728-4.411 4.49-4.411h4.768V9.418c-.83-.11-3.676-.357-6.987-.357-6.914 0-11.646 4.219-11.646 11.97v6.684h-7.793v9.082h7.793V60H0V0z" fill="#01b9c3" fill-rule="nonzero"/></svg>',
		),
		'feed'          => array(
			'name' => 'RSS Feed',
			'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M2,8.667V12c5.515,0,10,4.485,10,10h3.333C15.333,14.637,9.363,8.667,2,8.667z M2,2v3.333 c9.19,0,16.667,7.477,16.667,16.667H22C22,10.955,13.045,2,2,2z M4.5,17C3.118,17,2,18.12,2,19.5S3.118,22,4.5,22S7,20.88,7,19.5 S5.882,17,4.5,17z"></path></svg>',
		),
		'google'        => array(
			'name' => 'Google',
			'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M12.02,10.18v3.72v0.01h5.51c-0.26,1.57-1.67,4.22-5.5,4.22c-3.31,0-6.01-2.75-6.01-6.12s2.7-6.12,6.01-6.12 c1.87,0,3.13,0.8,3.85,1.48l2.84-2.76C16.99,2.99,14.73,2,12.03,2c-5.52,0-10,4.48-10,10s4.48,10,10,10c5.77,0,9.6-4.06,9.6-9.77 c0-0.83-0.11-1.42-0.25-2.05H12.02z"></path></svg>',
		),
		'github'        => array(
			'name' => 'GitHub',
			'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M12,2C6.477,2,2,6.477,2,12c0,4.419,2.865,8.166,6.839,9.489c0.5,0.09,0.682-0.218,0.682-0.484 c0-0.236-0.009-0.866-0.014-1.699c-2.782,0.602-3.369-1.34-3.369-1.34c-0.455-1.157-1.11-1.465-1.11-1.465 c-0.909-0.62,0.069-0.608,0.069-0.608c1.004,0.071,1.532,1.03,1.532,1.03c0.891,1.529,2.341,1.089,2.91,0.833 c0.091-0.647,0.349-1.086,0.635-1.337c-2.22-0.251-4.555-1.111-4.555-4.943c0-1.091,0.39-1.984,1.03-2.682 C6.546,8.54,6.202,7.524,6.746,6.148c0,0,0.84-0.269,2.75,1.025C10.295,6.95,11.15,6.84,12,6.836 c0.85,0.004,1.705,0.114,2.504,0.336c1.909-1.294,2.748-1.025,2.748-1.025c0.546,1.376,0.202,2.394,0.1,2.646 c0.64,0.699,1.026,1.591,1.026,2.682c0,3.841-2.337,4.687-4.565,4.935c0.359,0.307,0.679,0.917,0.679,1.852 c0,1.335-0.012,2.415-0.012,2.741c0,0.269,0.18,0.579,0.688,0.481C19.138,20.161,22,16.416,22,12C22,6.477,17.523,2,12,2z"></path></svg>',
		),
		'linkedin'      => array(
			'name' => 'LinkedIn',
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M60 0H0v60h60V0zM21.282 45.352h-7.306V23.37h7.306v21.982zm-3.653-24.983h-.047c-2.452 0-4.038-1.688-4.038-3.797 0-2.157 1.635-3.799 4.134-3.799 2.499 0 4.037 1.642 4.085 3.799 0 2.109-1.586 3.797-4.134 3.797zm29.999 24.983h-7.306v-11.76c0-2.955-1.058-4.971-3.701-4.971-2.019 0-3.221 1.36-3.749 2.672-.193.47-.24 1.126-.24 1.783v12.276h-7.306s.095-19.92 0-21.982h7.306v3.113c.971-1.498 2.708-3.629 6.584-3.629 4.807 0 8.412 3.142 8.412 9.893v12.605z" fill="#01b9c3" fill-rule="nonzero"/></svg>',
		),
		'mail'          => array(
			'name' => 'Mail',
			'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M20,4H4C2.895,4,2,4.895,2,6v12c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2V6C22,4.895,21.105,4,20,4z M20,8.236l-8,4.882 L4,8.236V6h16V8.236z"></path></svg>',
		),
		'twitter'       => array(
			'name' => 'Twitter',
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M0 0h60v60H0V0zm47.299 19.129a.759.759 0 00-.913-.161c-.314.142-.64.26-.973.351a6.826 6.826 0 001.157-2.226.761.761 0 00-1.172-.819 15.994 15.994 0 01-3.661 1.432 7.658 7.658 0 00-9.595-.741 7.553 7.553 0 00-3.287 6.977 18.015 18.015 0 01-12.618-6.796.787.787 0 00-.647-.284.761.761 0 00-.609.371 7.367 7.367 0 00-.84 5.717 8.149 8.149 0 001.323 2.765 4.059 4.059 0 01-.773-.494.762.762 0 00-1.241.59 7.872 7.872 0 004.054 6.757 5.665 5.665 0 01-.98-.21.762.762 0 00-.913 1.041 8.304 8.304 0 005.765 4.717 13.415 13.415 0 01-8.028 1.653.761.761 0 00-.461 1.418 22.814 22.814 0 0011.246 3.196 19.321 19.321 0 0010.674-3.264c6.031-4.003 9.789-11.189 9.266-17.618a14.204 14.204 0 003.308-3.448.762.762 0 00-.082-.924z" fill="#01b9c3" fill-rule="nonzero"/></svg>',
		),
		'share'         => array(
			'name' => 'Share Icon',
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 11.8l6.1-4.5c.1.4.4.7.9.7h2c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1h-2c-.6 0-1 .4-1 1v.4l-6.4 4.8c-.2-.1-.4-.2-.6-.2H6c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1h2c.2 0 .4-.1.6-.2l6.4 4.8v.4c0 .6.4 1 1 1h2c.6 0 1-.4 1-1v-2c0-.6-.4-1-1-1h-2c-.5 0-.8.3-.9.7L9 12.2v-.4z"/></svg>',
		),
	);

	if ( ! empty( $service )
		&& ! empty( $field )
		&& isset( $services_data[ $service ] )
		&& ( 'icon' === $field || 'name' === $field )
	) {
		return $services_data[ $service ][ $field ];
	} elseif ( ! empty( $service ) && isset( $services_data[ $service ] ) ) {
		return $services_data[ $service ];
	}

	return $services_data;
}




function add_menu_list_item_class($classes, $item, $args) {
  if (property_exists($args, 'list_item_class')) {
      $classes[] = $args->list_item_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


function add_sub_menu_class($classes, $depth, $args) {

	$submenu_classes = array_merge([], $classes);
	$submenu_classes[] = 'sub-menu group container';

	return $submenu_classes;
}
add_filter( 'jcs/menu_level_class', 'add_sub_menu_class', 10, 3 ); // Where $priority is default 10, $accepted_args is default 1.


/*** Function to show images whether SVG or non SVG ***/
/*** $size & $attribute both can hold array if you want ***/
if (!function_exists('show_image')){
  function show_image( $image_id, $size = null, $attributes = null ) {
    //first lets get the file info sto understand what kind of file it is
    //as for svg file we will take different approach
    $file_info = pathinfo( wp_get_attachment_url( $image_id ) );

    //so, if the file type is SVG
    if ( $file_info['extension'] === 'svg' ) {
      return file_get_contents( wp_get_attachment_url( $image_id ) );
    } else {
      //for any other type of images i.e. JPG, PNG, GIF
      //we can just simply use the wp_get_attachment_image() stock function
      return wp_get_attachment_image( $image_id, $size, false, $attributes );
    }
  }
}

add_filter( 'nav_menu_item_args', 'jcs_menu_item_args', 10, 3);
function jcs_menu_item_args($args, $item, $depth){

	if($depth > 0 && ( ! in_array( 'service_list_icon', get_post_custom_keys( '1' ) ) ) ){
		$image_id = get_post_meta($item->ID, 'service_list_icon', true);
		
		$image = show_image( $image_id, array('9999', '30'), array('class' => 'w-full h-full object-cover') );
		
		$args->link_before = '<span class="flex justify-start items-center p-8"><span class="flex items-center mr-8 h-8 flex-initial">' . $image . '</span>';
		$args->link_after = '</span>';
	}

	if($depth > 0){
		$args->link_class .= ' text-sm-2 font-semibold leading-tight';
	}
	return $args;
	
}