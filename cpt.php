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
	* Provider Names
	**************************/
	$labels = [
		"name" => __( "Provider Names", "bc" ),
		"singular_name" => __( "Provider", "bc" ),
	];
	$args = [
		"label" => __( "Provider Names", "bc" ),
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
	register_post_type( "provider_names", $args );

	/**************************
	* Provider Locations
	**************************/
	$labels = [
		"name" => __( "Provider Locations", "bc" ),
		"singular_name" => __( "Location", "bc" ),
	];
	$args = [
		"label" => __( "Provider Locations", "bc" ),
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
	register_post_type( "provider_locations", $args );

}

add_action( 'init', 'custom_post_types' );
?>