<?php
/**
 * Nuvra Task Theme functions and definitions.
 *
 * @package nuvra-task
 */

/**
 * Enqueue scripts and styles.
 */
function nuvra_task_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', array(), '0.1.0' );
	wp_enqueue_style(
		'nuvra-task-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'storefront-style' ),
		'0.1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'nuvra_task_parent_theme_enqueue_styles' );

/**
 * Decrease excerpt word length.
 */
function nuvra_task_excerpt_length() {
	return 20;
}
add_filter( 'excerpt_length', 'nuvra_task_excerpt_length' );