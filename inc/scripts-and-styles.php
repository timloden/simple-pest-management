<?php

/**
 * Enqueue scripts and styles.
 */
function scripts_and_styles()
{
	wp_enqueue_style('base-style', get_stylesheet_uri(), [],  wp_get_theme()->get('Version'));

	wp_enqueue_script('jquery');
	wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), wp_get_theme()->get('Version'), true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.min.js', array(), wp_get_theme()->get('Version'), true);
}

add_action('wp_enqueue_scripts', 'scripts_and_styles');