<?php

/**
 * Internationalization functionality.
 *
 * @link       https://profiles.wordpress.org/kenvilar
 * @since      1.1.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/includes
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass_i18n {
	
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'wp-generate-password',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
	
}
