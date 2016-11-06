<?php
/************************************
 * Author: Domenico Catelli - starting from the great work of MANSON David
 * URL:    http://domenicocatelli.com - - - - - - - - - - - - http://www.david-manson.com
 ************************************/


// Load dependencies
require_once( 'inc/helpers.php' );
require_once( 'inc/customizer.php' );


/************************************
Let's get everything up and running.
*************************************/
function theme_init() {
  add_action( 'init', 'head_cleanup' );
  add_action( 'init', 'theme_support' );
  add_action( 'init', 'theme_filters');
}
add_action( 'after_setup_theme', 'theme_init' );


/*********************
THEME SUPPORT
*********************/
function theme_support() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links');
	add_theme_support( 'menus' );
  add_theme_support( 'title-tag' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );
}


/************************************
  Oembed size option
*************************************/
if ( ! isset( $content_width ) ) {
	$content_width = 680;
}


/************************************
 Menu
*************************************/
register_nav_menus(array(
	'main-nav' => __( 'The Main Menu', 'monsieurpress' ),
	'footer-links' => __( 'Footer Links', 'monsieurpress' )
));


/************************************
 Sidebar
*************************************/
function theme_sidebars() {
	register_sidebar(array(
		'id' => 'main-sidebar',
		'name' => __( 'Main sidebar', 'monsieurpress' ),
		'description' => __( 'The main sidebar', 'monsieurpress' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>'
	));
}
add_action( 'widgets_init', 'theme_sidebars' );



/************************************
 Apply theme's stylesheet to the visual editor.
*************************************/
function theme_add_editor_styles() {
    add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'theme_add_editor_styles' );



/************************************
 Theme filters
*************************************/
function theme_filters(){
    add_filter( 'the_content', 'remove_ptags_on_images' );
    add_filter( 'excerpt_more', 'custom_excerpt_more' );
}



/************************************
 Assets
*************************************/
function front_assets_load() {
    if (is_admin()) return;

    /* Enqueue theme script & style */
    wp_enqueue_style( 'monsieurpress-stylesheet', get_stylesheet_uri()  );
    wp_enqueue_script( 'monsieurpress-js', get_template_directory_uri() . '/javascript/dist/scripts.js', array('jquery'));

    /* Enqueue google font */
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,600,700');

    /* Enqueue comment-reply script if needed */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'front_assets_load');

/************************************
 Hex to RGB - custom gradient overlay
*************************************/

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = ''.$r.','.$g.','.$b;
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

/************************************
 Reduce excerpt length
*************************************/


function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Filter the "read more" excerpt link
function excerpt_more( $more ) {
return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
  get_permalink( get_the_ID() ),
  __( 'Read More', 'monsieurpress' )
  );
}

/************************************
Option Page for theme settings
*************************************/


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

  // Add translatable strings for the footer options
  pll_register_string('footer-company', 'Footer: Company');
  pll_register_string('footer-contact', 'Footer: Contact');
  pll_register_string('footer-form', 'Footer: Contact Form');

}

/************************************
Costom Post Type for Services
*************************************/

function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Leistungen', 'Post Type General Name', 'monsieurpress' ),
		'singular_name'         => _x( 'Leistung', 'Post Type Singular Name', 'monsieurpress' ),
		'menu_name'             => __( 'Leistungen', 'monsieurpress' ),
		'name_admin_bar'        => __( 'Leistung', 'monsieurpress' ),
		'archives'              => __( 'Leistungen', 'monsieurpress' ),
		'parent_item_colon'     => __( 'Parent Leistung:', 'monsieurpress' ),
		'all_items'             => __( 'All Leistungen', 'monsieurpress' ),
		'add_new_item'          => __( 'Add New Leistung', 'monsieurpress' ),
		'add_new'               => __( 'Add Leistung', 'monsieurpress' ),
		'new_item'              => __( 'New Leistung', 'monsieurpress' ),
		'edit_item'             => __( 'Edit Leistung', 'monsieurpress' ),
		'update_item'           => __( 'Update Leistung', 'monsieurpress' ),
		'view_item'             => __( 'View Leistung', 'monsieurpress' ),
		'search_items'          => __( 'Search Leistung', 'monsieurpress' ),
		'not_found'             => __( 'Leistung Not found', 'monsieurpress' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'monsieurpress' ),
		'featured_image'        => __( 'Featured Image', 'monsieurpress' ),
		'set_featured_image'    => __( 'Set featured image', 'monsieurpress' ),
		'remove_featured_image' => __( 'Remove featured image', 'monsieurpress' ),
		'use_featured_image'    => __( 'Use as featured image', 'monsieurpress' ),
		'insert_into_item'      => __( 'Insert into service', 'monsieurpress' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'monsieurpress' ),
		'items_list'            => __( 'Services list', 'monsieurpress' ),
		'items_list_navigation' => __( 'Services list navigation', 'monsieurpress' ),
		'filter_items_list'     => __( 'Filter services list', 'monsieurpress' ),
	);
	$args = array(
		'label'                 => __( 'Leistung', 'monsieurpress' ),
		'description'           => __( 'All the Leistungen', 'monsieurpress' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-star-half',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'leistungen', $args );

}
add_action( 'init', 'custom_post_type', 0 );

?>
