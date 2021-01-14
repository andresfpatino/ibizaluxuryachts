<?php

// DISABLE GUTEMBERG
add_filter('use_block_editor_for_post', '__return_false', 10);

// Define Constants
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

// Enqueue styles
require_once(dirname(__FILE__).'/functions/enqueue_scripts.php');

// Flags languages
function languages_flags_path( $original_flags_path,  $language_code ){
	$languages_with_custom_flags = array( 'en_GB', 'es_ES' );
	if ( in_array( $language_code, $languages_with_custom_flags ) ) {
		return  get_stylesheet_directory_uri(). '/assets/flags/' ;
	}else {
		return $original_flags_path;
	}
}
add_filter( 'trp_flags_path', 'languages_flags_path', 10, 2 );

// BLOG POSTS 
require_once(dirname(__FILE__).'/shortcodes/shortcode_blog.php');

// Custom size images
function theme_support() {	
    add_image_size( 'ibz_blog', 433, 330, true ); 
	add_image_size( 'ultimos_yates', 600, 200, true ); 
	add_image_size( 'yate_destacado', 950, 300, true ); 
	add_image_size( 'gallery_yatch', 465, 310, true ); 
} 
add_action( 'after_setup_theme', 'theme_support' );

// Manage post columns
require_once(dirname(__FILE__).'/functions/manage-post-columns.php');

// Yates destacados
require_once(dirname(__FILE__).'/shortcodes/shortcode_yates-destacados.php');

// Grid Yates
require_once(dirname(__FILE__).'/shortcodes/shortcode_yates.php');

// Carousel sidebar Yates destacados
require_once(dirname(__FILE__).'/shortcodes/shortcode_yates-sidebar.php');


