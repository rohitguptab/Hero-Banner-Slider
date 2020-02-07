<?php
/**
 * Plugin Name: Hero Banner Slider
 * Plugin URI: https://github.com/rohitguptab/hero-banner-slider
 * Description: This is A Hero Banner Slider plugin for Gutenberg editor. It makes use of all the options provided by bxslider. You can also add other features like Title, Description of banner. This plugin lets you change the order of slides using drag & drop functionality.
 * Author: Rohit Gupta
 * Author URI: https://profiles.wordpress.org/rohitgupta3/
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue the block's assets for the editor.
 *
 * wp-blocks:  The registerBlockType() function to register blocks.
 * wp-element: The wp.element.createElement() function to create elements.
 * wp-i18n:    The __() function for internationalization.
 *
 * @since 1.0.0
 */
function rg_backend_enqueue() {
	wp_enqueue_script(
		'rg-slider-block-backend-script', // Unique handle.
		plugins_url( 'assets/js/block.build.js', __FILE__ ), // block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-dom-ready' ) // Dependencies, defined above.
	);
	wp_enqueue_style( 'rg-slider-block-front-css', plugin_dir_url( __FILE__ ) . '/assets/css/block.css' );
	//bx-slider script and style
	wp_enqueue_script( 'rg-slider-block-bx-slider', plugin_dir_url( __FILE__ ) . '/assets/js/jquery.bxslider.min.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'rg-slider-block-bxslider-style', plugin_dir_url( __FILE__ ) . '/assets/css/jquery.bxslider.css' );
}

add_action( 'enqueue_block_editor_assets', 'rg_backend_enqueue' );

function rg_block_enqueue() {
	//bx-slider script
	wp_enqueue_script( 'rg-slider-block-bx-slider-js', plugin_dir_url( __FILE__ ) . '/assets/js/jquery.bxslider.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'rg-slider-block-custom-js', plugin_dir_url( __FILE__ ) . '/assets/js/custom.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'rg-slider-block-front-css', plugin_dir_url( __FILE__ ) . '/assets/css/front.css' );
	wp_enqueue_style( 'rg-slider-block-bxslider-css', plugin_dir_url( __FILE__ ) . '/assets/css/jquery.bxslider.css' );
}

add_action( 'wp_enqueue_scripts', 'rg_block_enqueue' );
