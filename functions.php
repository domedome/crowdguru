<?php
/************************************
 * Author: MANSON David
 * URL: http://www.david-manson.com
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
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Open+Sans');

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
// tn excerpt more
function excerpt_more( $more ) {
return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
  get_permalink( get_the_ID() ),
  __( 'Read More', 'textdomain' )
  );
}
