<?php
/**
 * healthity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package healthity
 */

if ( ! function_exists( 'healthity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function healthity_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on healthity, use a find and replace
		 * to change 'healthity' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'healthity', get_template_directory() . '/languages' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'menus' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'healthity' ),
			'menu-footer' => esc_html__( 'Footer', 'healthity' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form'
		) );

	}
endif;
add_action( 'after_setup_theme', 'healthity_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function healthity_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'healthity' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'healthity' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'healthity_widgets_init' );

/* Remove WP Jquery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
} */

/**
 * Enqueue scripts and styles.
 */
function healthity_scripts() {
    wp_enqueue_style( 'healthity-style', get_template_directory_uri() . '/css/style-bottom.css' );

	wp_enqueue_script( 'healthity-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', '', '', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', '', '', true );
	wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/js/jquery.inputmask.min.js', '', '', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', '', '', true );
	wp_enqueue_script( 'SmoothScroll', get_template_directory_uri() . '/js/SmoothScroll.js', '', '', true );
	wp_enqueue_script( 'rellax', get_template_directory_uri() . '/js/rellax.min.js', '', '', true );
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', '', '', true );
	wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', '', '', true );
    wp_enqueue_script( 'additional', get_template_directory_uri() . '/js/additional.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'healthity_scripts' );


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
}


/* Theme Options */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/* Add class 'active' to current page */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

// Remove editor on some pages
function remove_post_type_support_for_pages() {
    if ( !is_singular( 'product' ) ) {
        // UNCOMMENT if you want to remove some stuff
        // Replace 'page' with 'post' or a custom post/content type
        # remove_post_type_support( 'page', 'title' );
        remove_post_type_support( 'page', 'editor' );
        remove_post_type_support( 'post', 'editor' );
        # remove_post_type_support( 'page', 'thumbnail' );
        # remove_post_type_support( 'page', 'page-attributes' );
        # remove_post_type_support( 'page', 'excerpt' );
    }
}
add_action( 'admin_init', 'remove_post_type_support_for_pages' );

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function wpdocs_my_search_form( $form ) {
    $form = '<form class="search-form" action="/" method="get">
    <span class="close-search"></span>
    <input class="input-field" type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search Here...">
    <span class="search-button">
        <span class="icon">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                <g>
                    <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/>
                </g>
            </svg>
        </span>
    </span>
</form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );



add_action('after_setup_theme', 'vardumper_load');

function vardumper_load()
{

    require_once get_template_directory() . '/vendor/autoload.php';

}
