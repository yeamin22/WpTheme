<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage YH_POT
 * @since YH Pot 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/includes/back-compat.php';
}
if(!defined('YHPOT_ASSETS')){
	define("YHPOT_ASSETS", get_template_directory_uri() . "/assets");
}

if(!defined('YHPOT_INCLUDE_PATH')){
	define("YHPOT_INCLUDE_PATH", get_template_directory() . "/includes");
}
if(!defined('YHPOT_PATH')){
	define("YHPOT_PATH", get_template_directory());
}
if(!defined('YHPOT_TEXTDOMAIN')){
	define("YHPOT_TEXTDOMAIN", 'yh-pot');
}


if ( ! function_exists( 'yhpot_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function yhpot_theme_setup() {
		
		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', YHPOT_TEXTDOMAIN ),
				'footer'  => esc_html__( 'Secondary menu', YHPOT_TEXTDOMAIN ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		add_theme_support( 'automatic-feed-links' );		

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);
	}
}
add_action( 'after_setup_theme', 'yhpot_theme_setup' );

/* Register Sidebars */
function yhpot_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', YHPOT_TEXTDOMAIN ),
		'id'            => 'blog-sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', YHPOT_TEXTDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget widget_block %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yhpot_widgets_init' );

/* Require Enqueue file*/
if(file_exists( YHPOT_INCLUDE_PATH . "/enqueue.php")){
	require_once YHPOT_INCLUDE_PATH . "/enqueue.php";
}
if(file_exists( YHPOT_INCLUDE_PATH . "/custom-comment.php")){
	require_once YHPOT_INCLUDE_PATH . "/custom-comment.php";
}

if(file_exists( YHPOT_INCLUDE_PATH . "/admin/Admin.php")){
	require_once YHPOT_INCLUDE_PATH . "/admin/Admin.php";
}

if(file_exists( YHPOT_PATH . "/lib/redux/redux-core/framework.php")){
	require_once YHPOT_PATH . "/lib/redux/redux-core/framework.php";
}
if(file_exists( YHPOT_PATH . "/lib/redux/sample/config.php")){
	require_once YHPOT_PATH . "/lib/redux/sample/config.php";
}


if(is_admin()){
	if(file_exists( YHPOT_PATH . "/lib/tgm/class-tgm-plugin-activation.php")){
		require_once YHPOT_PATH . "/lib/tgm/class-tgm-plugin-activation.php";
	}
	if(file_exists( YHPOT_INCLUDE_PATH . "/yhpot-tgm.php")){
		require_once YHPOT_INCLUDE_PATH . "/yhpot-tgm.php";
	}
}
if(file_exists( YHPOT_INCLUDE_PATH . "/importer/class-yhpot-demo-import.php")){
	require_once YHPOT_INCLUDE_PATH . "/importer/class-yhpot-demo-import.php";
	new Yhpot_Demo_Import();
}

if(file_exists( YHPOT_INCLUDE_PATH . "/yhpot-functions.php")){
	require_once YHPOT_INCLUDE_PATH . "/yhpot-functions.php";
}


