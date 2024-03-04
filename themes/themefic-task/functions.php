<?php
/**
 * Themefic Task functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Themefic_Task
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
function themefic_task_setup() {
	load_theme_textdomain( 'themefic-task', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(array(
		'top_menu'     => __('Top_Menu', 'themefic-task'),
		'mainmenu'     => __('Main Menu', 'themefic-task'),
		'primary_menu' => __('Primary Menu', 'themefic-task'),
		'footer_menu'  => __('Footer Menu', 'themefic-task')
	));

	// Register Custom menu link class 

function themefic_primary_menu($classes, $item, $args)
{
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'themefic_primary_menu', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// Register Custom Navigation Walker

function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

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
			'themefic_task_custom_background_args',
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
add_action( 'after_setup_theme', 'themefic_task_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themefic_task_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'themefic_task_content_width', 640 );
}
add_action( 'after_setup_theme', 'themefic_task_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themefic_task_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'themefic-task' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'themefic-task' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'themefic_task_widgets_init' );

//  Register Footer Widget Areas 
function theme_register_footer_widgets()
{
    register_sidebar(array(
        'name'          => __('Footer Column 1', 'themefic-task'),
        'id'            => 'footer-column-1',
        'description'   => __('Widgets for the first column in the footer.', 'themefic-task'),
        'before_widget' => '<div id="%1$s" class="content %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-logo">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'themefic-task'),
        'id'            => 'footer-column-2',
        'description'   => __('Widgets for the second column in the footer.', 'themefic-task'),
        'before_widget' => '<div id="%1$s" class="  footer-tittle footer-content %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 3', 'themefic-task'),
        'id'            => 'footer-column-3',
        'description'   => __('Widgets for the third column in the footer.', 'themefic-task'),
        'before_widget' => '<div id="%1$s" class="  footer-tittle footer-content %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 4', 'themefic-task'),
        'id'            => 'footer-column-4',
        'description'   => __('Widgets for the fourth column in the footer.', 'themefic-task'),
        'before_widget' => '<div id="%1$s" class="  footer-tittle %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-content">',
        'after_title'   => '</h4>',
    ));
}

add_action('widgets_init', 'theme_register_footer_widgets');

/**
 * Enqueue scripts and styles.
 */
function themefic_task_scripts() {
	// Enqueue Styles
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'font-style', get_template_directory_uri() . '/assets/css/font.css', array(), _S_VERSION );
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'global-style', get_template_directory_uri() . '/assets/css/global.css', array(), _S_VERSION );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );
	wp_style_add_data( 'main-style', 'rtl', 'replace' );

	// Enqueue Scripts
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/assets/js/fontawesome.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'navigation-js', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'customizer-js', get_template_directory_uri() . '/assets/js/customizer.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themefic_task_scripts' );


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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * codestar-framework for this theme.
 */
require_once get_theme_file_path() . '/inc/codestar/codestar-framework.php';
require_once get_theme_file_path() . '/inc/codestar/samples/my-admin.php';

/**
 * tgm-plugin-activation for this theme.
 */
// require_once get_theme_file_path() . '/inc/tgm/admin.php';
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';


function themefic_task_register_required_plugins() {

	$plugins = array(


		array(
			'name'               => 'TGM Example Plugin', // The plugin name.
			'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'         => 'TGM New Media Plugin', // The plugin name.
			'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
			'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),

		array(
			'name'         => 'AMP', // The plugin name.
			'slug'         => 'amp', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead
		),

		array(
			'name'      => 'Adminbar Link Comments to Pending',
			'slug'      => 'adminbar-link-comments-to-pending',
			'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		),

		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => true,
			'source' => 'https://wordpress.org/plugins/classic-editor/',
		),

	);


	$config = array(
		'id'           => 'themefic-task',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		

	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'themefic_task_register_required_plugins' );











function my_custom_init() {
	add_shortcode( 'qg_shortcode', 'qg_shortcode' );
	function qg_shortcode() {
		$buffer = '<h3>Post Titles</h3>';
		$q = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => 5
		));
		while ($q->have_posts()) {
			$q->the_post();
			$buffer = $buffer.get_the_title().'<br>';
		}
		wp_reset_postdata();
		return $buffer;
	}
}



add_action('init', 'my_custom_init');
