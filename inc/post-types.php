<?php
/**
 * Custom post types
 */

// Services post type

function custom_post_type_services() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'simple-pest' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'simple-pest' ),
		'menu_name'             => __( 'Services', 'simple-pest' ),
		'name_admin_bar'        => __( 'Services', 'simple-pest' ),
		'archives'              => __( 'Services Archives', 'simple-pest' ),
		'attributes'            => __( 'Service Attributes', 'simple-pest' ),
		'parent_item_colon'     => __( 'Parent Service:', 'simple-pest' ),
		'all_items'             => __( 'All Services', 'simple-pest' ),
		'add_new_item'          => __( 'Add New Service', 'simple-pest' ),
		'add_new'               => __( 'Add Service', 'simple-pest' ),
		'new_item'              => __( 'New Service', 'simple-pest' ),
		'edit_item'             => __( 'Edit Service', 'simple-pest' ),
		'update_item'           => __( 'Update Service', 'simple-pest' ),
		'view_item'             => __( 'View Service', 'simple-pest' ),
		'view_items'            => __( 'View Services', 'simple-pest' ),
		'search_items'          => __( 'Search Service', 'simple-pest' ),
		'not_found'             => __( 'Not found', 'simple-pest' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'simple-pest' ),
		'featured_image'        => __( 'Featured Image', 'simple-pest' ),
		'set_featured_image'    => __( 'Set featured image', 'simple-pest' ),
		'remove_featured_image' => __( 'Remove featured image', 'simple-pest' ),
		'use_featured_image'    => __( 'Use as featured image', 'simple-pest' ),
		'insert_into_item'      => __( 'Insert into Service', 'simple-pest' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'simple-pest' ),
		'items_list'            => __( 'Services list', 'simple-pest' ),
		'items_list_navigation' => __( 'Services list navigation', 'simple-pest' ),
		'filter_items_list'     => __( 'Filter Services', 'simple-pest' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'simple-pest' ),
		'description'           => __( 'Simple Pest Management services', 'simple-pest' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail','excerpt' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'services', $args );
}
add_action( 'init', 'custom_post_type_services', 0 );


// Services post type

function custom_post_type_service_areas() {

	$labels = array(
		'name'                  => _x( 'Service Areas', 'Post Type General Name', 'simple-pest' ),
		'singular_name'         => _x( 'Service Area', 'Post Type Singular Name', 'simple-pest' ),
		'menu_name'             => __( 'Service Areas', 'simple-pest' ),
		'name_admin_bar'        => __( 'Service Areas', 'simple-pest' ),
		'archives'              => __( 'Service Area Archives', 'simple-pest' ),
		'attributes'            => __( 'Service Area Attributes', 'simple-pest' ),
		'parent_item_colon'     => __( 'Parent Service:', 'simple-pest' ),
		'all_items'             => __( 'All Service Areas', 'simple-pest' ),
		'add_new_item'          => __( 'Add New Service Area', 'simple-pest' ),
		'add_new'               => __( 'Add Service Area', 'simple-pest' ),
		'new_item'              => __( 'New Service Area', 'simple-pest' ),
		'edit_item'             => __( 'Edit Service Area', 'simple-pest' ),
		'update_item'           => __( 'Update Service Area', 'simple-pest' ),
		'view_item'             => __( 'View Service Area', 'simple-pest' ),
		'view_items'            => __( 'View Service Areas', 'simple-pest' ),
		'search_items'          => __( 'Search Service Areas', 'simple-pest' ),
		'not_found'             => __( 'Not found', 'simple-pest' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'simple-pest' ),
		'featured_image'        => __( 'Featured Image', 'simple-pest' ),
		'set_featured_image'    => __( 'Set featured image', 'simple-pest' ),
		'remove_featured_image' => __( 'Remove featured image', 'simple-pest' ),
		'use_featured_image'    => __( 'Use as featured image', 'simple-pest' ),
		'insert_into_item'      => __( 'Insert into Service Area', 'simple-pest' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service Area', 'simple-pest' ),
		'items_list'            => __( 'Service Areas list', 'simple-pest' ),
		'items_list_navigation' => __( 'Service Areas list navigation', 'simple-pest' ),
		'filter_items_list'     => __( 'Filter Service Areas', 'simple-pest' ),
	);
	$args = array(
		'label'                 => __( 'Service Area', 'simple-pest' ),
		'description'           => __( 'Simple Pest Management service areas', 'simple-pest' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'locations' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-site',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'service-areas', $args );

	add_rewrite_rule( 'service-areas/([^/]+)/wasps', 'index.php?service-areas=$matches[1]&wasps=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/rodents', 'index.php?service-areas=$matches[1]&rodents=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/bed-bugs', 'index.php?service-areas=$matches[1]&bed-bugs=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/cockroach', 'index.php?service-areas=$matches[1]&cockroaches=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/silverfish', 'index.php?service-areas=$matches[1]&silverfish=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/spiders', 'index.php?service-areas=$matches[1]&spiders=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/ants', 'index.php?service-areas=$matches[1]&ants=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/fleas-ticks-mites', 'index.php?service-areas=$matches[1]&fleas-ticks-mites=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/carpet-beetles', 'index.php?service-areas=$matches[1]&carpet-beetles=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/centipedes', 'index.php?service-areas=$matches[1]&centipedes=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/mosquitos', 'index.php?service-areas=$matches[1]&mosquitos=yes', 'top' );
	add_rewrite_rule( 'service-areas/([^/]+)/earwigs', 'index.php?service-areas=$matches[1]&earwigs=yes', 'top' );
}
add_action( 'init', 'custom_post_type_service_areas', 0 );


function prefix_register_query_var( $vars ) {

	$vars[] = 'wasps';
	$vars[] = 'rodents';
	$vars[] = 'bed-bugs';
	$vars[] = 'cockroaches';
	$vars[] = 'silverfish';
	$vars[] = 'spiders';
	$vars[] = 'ants';
	$vars[] = 'fleas-ticks-mites';
	$vars[] = 'carpet-beetles';
	$vars[] = 'centipedes';
	$vars[] = 'mosquitos';
	$vars[] = 'earwigs';
	return $vars;
}

add_filter( 'query_vars', 'prefix_register_query_var' );

function prefix_url_rewrite_templates() {

	if ( is_singular( 'service-areas' ) && get_query_var('wasps')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-wasps.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('rodents')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-rodents.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('bed-bugs')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-bed-bugs.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('cockroaches')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-cockroaches.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('ants')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-ants.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('silverfish')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-silverfish.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('spiders')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-spiders.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('fleas-ticks-mites')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-fleas-ticks-mites.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('carpet-beetles')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-carpet-beetles.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('centipedes')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-centipedes.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('mosquitos')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-mosquitos.php';
		});
	}

	if ( is_singular( 'service-areas' ) && get_query_var('earwigs')) {

		add_filter( 'template_include', function() {
			return get_template_directory() . '/single-service-areas-earwigs.php';
		});
	}

}

add_action( 'template_redirect', 'prefix_url_rewrite_templates' );


// Pest post type

function custom_post_type_pests() {

	$labels = array(
		'name'                  => _x( 'Pests', 'Post Type General Name', 'simple-pest' ),
		'singular_name'         => _x( 'Pest', 'Post Type Singular Name', 'simple-pest' ),
		'menu_name'             => __( 'Pests', 'simple-pest' ),
		'name_admin_bar'        => __( 'Pests', 'simple-pest' ),
		'archives'              => __( 'Pest Archives', 'simple-pest' ),
		'attributes'            => __( 'Pest Area Attributes', 'simple-pest' ),
		'parent_item_colon'     => __( 'Parent Pest:', 'simple-pest' ),
		'all_items'             => __( 'All Pests', 'simple-pest' ),
		'add_new_item'          => __( 'Add New Pest', 'simple-pest' ),
		'add_new'               => __( 'Add Pest', 'simple-pest' ),
		'new_item'              => __( 'New Pest', 'simple-pest' ),
		'edit_item'             => __( 'Edit Pest', 'simple-pest' ),
		'update_item'           => __( 'Update Pest', 'simple-pest' ),
		'view_item'             => __( 'View Pest', 'simple-pest' ),
		'view_items'            => __( 'View Pests', 'simple-pest' ),
		'search_items'          => __( 'Search Pests', 'simple-pest' ),
		'not_found'             => __( 'Not found', 'simple-pest' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'simple-pest' ),
		'featured_image'        => __( 'Featured Image', 'simple-pest' ),
		'set_featured_image'    => __( 'Set featured image', 'simple-pest' ),
		'remove_featured_image' => __( 'Remove featured image', 'simple-pest' ),
		'use_featured_image'    => __( 'Use as featured image', 'simple-pest' ),
		'insert_into_item'      => __( 'Insert into Pest', 'simple-pest' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Pest', 'simple-pest' ),
		'items_list'            => __( 'Pests list', 'simple-pest' ),
		'items_list_navigation' => __( 'Pests list navigation', 'simple-pest' ),
		'filter_items_list'     => __( 'Filter Pests', 'simple-pest' ),
	);
	$args = array(
		'label'                 => __( 'Pest', 'simple-pest' ),
		'description'           => __( 'Simple Pest Management pests', 'simple-pest' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-buddicons-replies',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'pests', $args );

}
add_action( 'init', 'custom_post_type_pests', 0 );