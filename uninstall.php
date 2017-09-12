<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://profiles.wordpress.org/kenvilar
 * @since      1.3.0
 * @package    Wp_Generate_Password
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
