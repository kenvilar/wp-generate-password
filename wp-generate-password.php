<?php
/*
 * Plugin Name:     WP Generate Password
 * Plugin URI:      https://wordpress.org/plugins/wp-generate-password/
 * Description:     A simple plugin that will generate password and displays at the top of every admin pages.
 * Version:         1.1.0
 * Author:          Ken Vilar
 * Author URI:      https://profiles.wordpress.org/kenvilar
 * Text Domain:     wp-generate-password
 * Domain Path:     /languages
 * License:         GPL2
 *
 * @link            https://profiles.wordpress.org/kenvilar
 * @since           1.1.0
 * @package         Wp_Generate_Password
 *
 * WP Generate Password is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WP Generate Password is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Generate Password. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// Abort if this file is called directly
if ( ! defined( 'WPINC' ) ) {
	exit;
}

// Prevent any unauthorized access to your code
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WPGENERAPASS_NAME', 'wp-generate-password' );
define( 'WPGENERAPASS_VERSION', '1.1.0' );

register_activation_hook( __FILE__, 'activate_wpgenerapass' );
register_deactivation_hook( __FILE__, 'deactivate_wpgenerapass' );

if ( ! function_exists( 'activate_wpgenerapass' ) ) :
	function activate_wpgenerapass() {
		if ( current_user_can( 'manage_options' ) ) :
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpgenerapass-activator.php';
			WPGeneraPass_Activator::activate();
		endif;
	}
endif;

if ( ! function_exists( 'deactivate_wpgenerapass' ) ) :
	function deactivate_wpgenerapass() {
		if ( current_user_can( 'manage_options' ) ) :
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpgenerapass-deactivator.php';
			WPGeneraPass_Deactivator::deactivate();
		endif;
	}
endif;

/*
 * This is the core plugin class used to define
 * main functions for the plugin capabilities.
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/class-wpgenerapass.php' ) ) :
	require plugin_dir_path( __FILE__ ) . 'includes/class-wpgenerapass.php';
endif;

// This is where the plugin execute
function run_wpgenerapass() {
	$plugin = new WPGeneraPass();
	$plugin->run();
}

run_wpgenerapass();
