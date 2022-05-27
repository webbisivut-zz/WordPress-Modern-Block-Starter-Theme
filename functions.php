<?php
/**
 * Blox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Blox
 * @since Blox 1.0
 */


if ( ! function_exists( 'blox_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Blox 1.0
	 *
	 * @return void
	 */
	function blox_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'blox_support' );

if ( ! function_exists( 'blox_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Blox 1.0
	 *
	 * @return void
	 */
	function blox_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'blox-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		wp_register_style(
			'blox-front-endstyle',
			get_template_directory_uri() . '/dist/bundle.css',
			array(),
			$version_string
		);

		wp_register_script(
			'blox-front-js',
			get_template_directory_uri() . '/dist/bundle.js',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'blox-style' );
		wp_enqueue_script( 'blox-front-js' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'blox_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
