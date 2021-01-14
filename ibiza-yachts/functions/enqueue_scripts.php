<?php 
function child_enqueue_styles() {
	//-- Styles
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	// Slick
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.css', array(), "1.8.1", 'all' ); 
	wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css', array(), "1.8.1", 'all' ); 
	//Fancybox
	wp_enqueue_style( 'jquery.fancybox.css', get_stylesheet_directory_uri() . '/assets/fancybox/jquery.fancybox.css', array(), "2.1.5", 'all' ); 
	wp_enqueue_style( 'jquery.fancybox-buttons.css', get_stylesheet_directory_uri() . '/assets/fancybox/helpers/jquery.fancybox-buttons.css', array(), "1.0.5", 'all' );
	wp_enqueue_style( 'jquery.fancybox-thumbs.css', get_stylesheet_directory_uri() . '/assets/fancybox/helpers/jquery.fancybox-thumbs.css', array(), "1.0.7", 'all' );
	// Ibiza	
	wp_enqueue_style( 'ibiza-theme-css', get_stylesheet_directory_uri() . '/assets/css/main.css', '1.0', 'all' );	
	
	// -- Scripts
	// Slick
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), "1.8.1", true );
	// Fancybox
	wp_enqueue_script( 'jquery.fancybox.pack.js', get_stylesheet_directory_uri() . '/assets/fancybox/jquery.fancybox.pack.js', array('jquery'), "2.1.5", true );	
	wp_enqueue_script( 'jquery.fancybox-buttons.js', get_stylesheet_directory_uri() . '/assets/fancybox/helpers/jquery.fancybox-buttons.js', array('jquery'), "1.0.5", true );	
	wp_enqueue_script( 'jquery.fancybox-thumbs.js', get_stylesheet_directory_uri() . '/assets/fancybox/helpers/jquery.fancybox-thumbs.js', array('jquery'), "1.0.7", true );
	// Ibiza
	wp_enqueue_script( 'ibiza-theme-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles');