<?php
/**
 * c2c functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package c2c
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function c2c_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on c2c, use a find and replace
		* to change 'c2c' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'c2c', get_template_directory() . '/languages' );

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

	add_image_size( 'blog', 511, 446, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Top menu', 'c2c' ),
			'footer-1' => esc_html__( 'Footer 1', 'c2c' ),
			'footer-2' => esc_html__( 'Footer 2', 'c2c' ),
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
			'height'      => 30,
			'width'       => 303,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'c2c_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function c2c_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'c2c_content_width', 640 );
}
add_action( 'after_setup_theme', 'c2c_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function c2c_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'c2c' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Footer widgets here.', 'c2c' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'c2c_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function c2c_scripts() {
	global $wp_query;
	global $is_IE;

	wp_enqueue_style( 'c2c-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );

	if( $is_IE ) {
		wp_enqueue_script( 'polyfill', 'https://polyfill.io/v3/polyfill.min.js?features=URLSearchParams%2Ces6%2Cfetch%2CElement.prototype.remove%2CArray.prototype.forEach%2CElement.prototype.classList', array(), _S_VERSION, false );
	}

	wp_enqueue_script( 'c2c-script', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );
	wp_localize_script( 'c2c-script', 'c2c', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'query' => json_encode( $wp_query->query_vars ),
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'c2c_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function c2c_get_option( $field_name, $post_id = 'option', $default_value = '' ) {
	$value = get_field($field_name, $post_id);

	if( $value === null && !empty($default_value) ) {
		$value = $default_value;
	}
	//we can add sample data here
	return $value;
}

add_action('wp_ajax_loadmore', 'c2c_loadmore_ajax');
add_action('wp_ajax_nopriv_loadmore', 'c2c_loadmore_ajax');
function c2c_loadmore_ajax() {
	$paged = ( !empty($_POST['page']) ) ? ++$_POST['page'] : 1;

	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $paged;
	$args['post_status'] = 'publish';

	$the_query = new WP_Query( $args );

	$max = $the_query->max_num_pages;

	if( $paged <= $max && $the_query->have_posts() ) :
		while( $the_query->have_posts() ): $the_query->the_post();
			get_template_part( 'template-parts/content', 'single');
		endwhile;
		wp_reset_postdata();
	endif;
	exit;
}