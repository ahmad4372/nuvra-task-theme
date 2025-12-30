<?php
/**
 * Nuvra Task Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nuvra-task
 */

add_action( 'wp_enqueue_scripts', 'nuvra_task_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function nuvra_task_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css', array(), '0.1.0' );
	wp_enqueue_style(
		'nuvra-task-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentytwentyfive-style' ),
		'0.1.0'
	);
}


add_filter( 'excerpt_length', function() {
	return 20;
} );