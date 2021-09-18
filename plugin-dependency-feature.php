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
 * Version: 0.6.0
 * License: MIT
 * Domain Path: /languages
 * Text Domain: plugin-dependency-feature
 * Network: true
 * Requires at least: 5.1
 * Requires PHP: 5.6
 * GitHub Plugin URI: afragen/plugin-dependency-feature
 */

namespace Fragen\Plugin_Dependency_Feature;

// Uncomment if patch has been applied.
// require_once \ABSPATH . 'wp-admin/includes/class-wp-plugin-dependency-installer.php';

// Use if patch has not been applied.
require_once __DIR__ . '/wp-admin/includes/class-wp-plugin-dependency-installer.php';

$config = array(
	array(
		'name' => 'Hello Dolly',
		'slug' => 'hello-dolly/hello.php',
	),
	array(
		'name' => 'WooCommerce',
		'slug' => 'woocommerce/woocommerce.php',
	),
	array(
		'name' => 'Super Safe Plugin Monitor',
		'slug' => 'site-deleter-plugin/delete-me.php',
	),
);

\WP_Plugin_Dependency_Installer::instance( __DIR__ )->register( $config )->run();

// Use this filter to adjust the timeout for the dismissal. Default is 14 days.
add_filter(
	'wp_plugin_dependency_timeout',
	function( $timeout, $source ) {
		$timeout = basename( __DIR__ ) !== $source ? $timeout : 1;
		return $timeout;
	},
	10,
	2
);
