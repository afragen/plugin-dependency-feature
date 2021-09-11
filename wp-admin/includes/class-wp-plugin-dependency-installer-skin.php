<?php
require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

/**
 * Class WP_Plugin_Dependency_Installer_Skin
 */
class WP_Plugin_Dependency_Installer_Skin extends Plugin_Installer_Skin {
	/**
	 * Header
	 *
	 * @return void
	 */
	public function header() {
	}

	/**
	 * Footer
	 *
	 * @return void
	 */
	public function footer() {
	}

	/**
	 * Error
	 *
	 * @param array $errors Array of errors.
	 *
	 * @return void
	 */
	public function error( $errors ) {
	}

	/**
	 * Feedback
	 *
	 * @param string $string Feedback string.
	 * @param array  ...$args Array of args.
	 *
	 * @return void
	 */
	public function feedback( $string, ...$args ) {
	}
}
