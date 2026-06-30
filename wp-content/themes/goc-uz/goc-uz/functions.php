<?php
/**
 * goc-uz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package goc-uz
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function goc_uz_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on goc-uz, use a find and replace
	 * to change 'goc-uz' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('goc-uz', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'Main' => __('Главное меню', 'goc-uz'),
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
			'goc_uz_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'goc_uz_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function goc_uz_content_width()
{
	$GLOBALS['content_width'] = apply_filters('goc_uz_content_width', 640);
}
add_action('after_setup_theme', 'goc_uz_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function goc_uz_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'goc-uz'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'goc-uz'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'goc_uz_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function goc_uz_scripts()
{
	wp_enqueue_style('goc-uz-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/assets/css/bootstrap.css", array(), _S_VERSION);
	wp_enqueue_style('main-css', get_template_directory_uri() . "/assets/css/main.css", array(), _S_VERSION);
	wp_enqueue_style('responsive-css', get_template_directory_uri() . "/assets/css/responsive.css", array(), _S_VERSION);

	wp_style_add_data('goc-uz-style', 'rtl', 'replace');

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), _S_VERSION, true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);

	wp_enqueue_script('goc-uz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'goc_uz_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ------------------------------------------------------------------------
// Разрешить загрузку SVG
function allow_svg_upload($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// Фильтр для безопасности SVG
function fix_svg_mime_type($data, $file, $filename, $mimes)
{
	$ext = isset($data['ext']) ? $data['ext'] : '';
	if ('svg' === $ext) {
		$data['type'] = 'image/svg+xml';
	}
	return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 4);
// ------------------------------------------------------------------------
// класс актив для меню
function add_active_class_to_menu_link($atts, $item, $args)
{
	if (
		in_array('current-menu-item', $item->classes) ||
		in_array('current-menu-parent', $item->classes) ||
		in_array('current-menu-ancestor', $item->classes)
	) {
		$atts['class'] = isset($atts['class'])
			? $atts['class'] . ' active'
			: 'active';
	}

	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_active_class_to_menu_link', 10, 3);
// ------------------------------------------------------------------------
// отключить автоматические <p> - contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');
// ------------------------------------------------------------------------

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Настройки шапки',
		'menu_title' => 'Настройки шапки',
		'menu_slug' => 'header-settings',
		'capability' => 'edit_posts',
		'redirect' => false,
		'post_id' => 'option',
	));
}