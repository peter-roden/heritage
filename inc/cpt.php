<?php
function custom_post_types() {
	
	/**************************
	* Quotes
	**************************/
	$labels = [
		"name" => __( "Quotes", "bc" ),
		"singular_name" => __( "Quote", "bc" ),
	];
	$args = [
		"label" => __( "Quotes", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "quotes", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];
	register_post_type( "quotes", $args );
	
	/**************************
	* FAQs
	**************************/
	$labels = [
		"name" => __( "FAQs", "bc" ),
		"singular_name" => __( "FAQ", "bc" ),
	];
	$args = [
		"label" => __( "FAQs", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "quotes", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title" ],
		"show_in_graphql" => false
	];
	register_post_type( "faqs", $args );
	
}

add_action( 'init', 'custom_post_types' );

function register_taxonomies() {

	/**************************
	* FAQs->Topics
	**************************/

	$labels = [
		"name" => __( "Topics", "bc" ),
		"singular_name" => __( "Topic", "bc" ),
	];

	
	$args = [
		"label" => __( "Topics", "bc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'topics', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "topics",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "topics", [ "faqs" ], $args );
}
add_action( 'init', 'register_taxonomies' );

?>