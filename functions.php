<?php
add_action('init', 'heritage_vision_start_session', 1);
add_action('wp_logout', 'heritage_vision_end_session');
add_action('wp_login', 'heritage_vision_end_session');
function heritage_vision_start_session() {
	if( ! session_id() ) { session_start(); }
}
function heritage_vision_end_session() {
	session_destroy();
}

// enqueue styles & scripts
function enqueue_scripts() {
	wp_enqueue_style('style-css', get_template_directory_uri() .'/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function enqueue_admin_scripts() {
	wp_enqueue_style('style-css-admin', get_template_directory_uri() .'/admin.css');
}
add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );

function enqueue_js_scripts() {
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_script( 'contact-form', get_template_directory_uri() . '/js/contact-form.js', array(), '1.0.0', true );	
	wp_enqueue_script( 'scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array(), '1.0.0', true );	
	wp_enqueue_script( 'validate','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js', array(), '1.0.0', true );	
	wp_enqueue_script( 'additional-methods','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_js_scripts' );

// theme specific includes
require_once 'inc/blocks.php';						// custom blocks
require_once 'inc/cpt.php';							// custom post types
require_once 'inc/location-zipcode.php';			// location zipcode lookup
require_once 'inc/location-zipcode.php';			// location zipcode lookup
require_once 'inc/provider-search-functions.php';	// provider search functions
require_once 'inc/whitelabeling.php';				// whitelabeling

// form validation
function form_validation_scripts() {	
	wp_enqueue_script( 'validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'additional', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'form_validation_scripts' );

add_filter("gform_submit_button_2", "form_submit_button_2", 10, 2); function form_submit_button_2($button, $form){ return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fal fa-paper-plane'></i> REQUEST INFO</span></button>"; }

function search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
	if ($query->is_search) {
	  $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
	  $query->set('posts_per_page',3);
	}
  }
}

function extract_zipcode($address, $remove_statecode = false) {
	$zipcode = preg_match("/\b[A-Z]{2}\s+\d{5}(-\d{4})?\b/", $address, $matches);
	return $remove_statecode ? preg_replace("/[^\d\-]/", "", extract_zipcode($matches[0])) : $matches[0];
} 

?>