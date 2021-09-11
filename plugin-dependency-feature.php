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
 * Version: 0.2.0
 * License: MIT
 * Domain Path: /languages
 * Text Domain: plugin-dependency-feature
 * Network: true
 * Requires at least: 5.1
 * Requires PHP: 5.6
 * GitHub Plugin URI: afragen/plugin-dependency-feature
 */

namespace Fragen\Plugin_Dependency_Feature;

require_once __DIR__ . '/wp-admin/includes/class-wp-plugin-dependency-installer.php';
( new \WP_Plugin_Dependency_Installer( __DIR__ ) )->run();

$config = array(
	array(
		'name'     => 'Hello Dolly',
		'slug'     => 'hello-dolly/hello.php',
		'uri'      => 'https://wordpress.org/plugins/hello-dolly',
		'required' => true,
	),
);
// ( new \WP_Plugin_Dependency_Installer( __DIR__ ) )->register( $config )->run();

add_filter(
	'wp_dependency_timeout',
	function( $timeout, $source ) {
		$timeout = basename( __DIR__ ) !== $source ? $timeout : 1;
		return $timeout;
	},
	10,
	2
);
