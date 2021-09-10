<?php
/**
 * Plugin Dependency Feature
 *
 * @author  Andy Fragen
 * @license MIT
 * @link    https://github.com/afragen/plugin-dependency-feature
 * @package plugin-dependency-feature
 */

/**
 * Plugin Name: Plugin Dependency Feature
 * Plugin URI: https://github.com/afragen/plugin-dependency-feature
 * Description: Testing WordPress plugin dependencies.
 * Author: Andy Fragen
 * Version: 0.1.0
 * License: MIT
 * Domain Path: /languages
 * Text Domain: plugin-dependency-feature
 * Network: true
 * Requires at least: 5.1
 * Requires PHP: 5.6
 * GitHub Plugin URI: afragen/plugin-dependency-feature
 */

require_once __DIR__ . '/vendor/autoload.php';
WP_Dependency_Installer::instance( __DIR__ )->run();

add_filter(
	'wp_dependency_timeout',
	function( $timeout, $source ) {
		$timeout = basename( __DIR__ ) !== $source ? $timeout : 1;
		return $timeout;
	},
	10,
	2
);

//add_filter(
//	'wp_dependency_dismiss_label',
//	function( $label, $source ) {
//		$label = basename( __DIR__ ) !== $source ? $label : __( 'Plugin Dependency //Feature', 'plugin-dependency-feature' );
//		return $label;
//	},
//	10,
//	2
//);

// Sanity check for WPDI v3.0.0.
if ( ! method_exists( 'WP_Dependency_Installer', 'json_file_decode' ) ) {
	add_action(
		'admin_notices',
		function() {
			$class   = 'notice notice-error is-dismissible';
			$label   = __( 'Plugin Dependency Feature', 'plugin-dependency-feature' );
			$file    = ( new ReflectionClass( 'WP_Dependency_Installer' ) )->getFilename();
			$message = __( 'Another theme or plugin is using a previous version of the WP Dependency Installer library, please update this file and try again:', 'plugin-dependency-feature' );
			printf( '<div class="%1$s"><p><strong>[%2$s]</strong> %3$s</p><pre>%4$s</pre></div>', esc_attr( $class ), esc_html( $label ), esc_html( $message ), esc_html( $file ) );
		},
		1
	);
	return false; // Exit early.
}
