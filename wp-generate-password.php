<?php
/*
 * Plugin Name:     WP Generate Password
 * Plugin URI:      http://kenvilar.com/wp-generate-password/
 * Description:     A simple plugin that will generate password and displays at the top of every admin pages.
 * Version:         1.0.0
 * Author:          Ken Vilar
 * Author URI:      http://kenvilar.com/
 * Text Domain:     wp-generate-password
 * Domain Path:     /languages
 * License:         GPL2
 *
 * @link            http://kenvilar.com
 * @since           1.0.0
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

function activate_wpgenerapass() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpgenerapass-activator.php';
    WPGeneraPass_Activator::activate();
}

// This is the function where the password is generated
if ( ! function_exists( 'wp_generapass_generate_password' ) ):
    function wp_generapass_generate_password( $extra_special_chars = false ) {
        $chars  = 'abcdefghijklmnopqrstuvwxyz';
        $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars .= '0123456789';
        $chars .= '!@#$%^&*()';

        if ( $extra_special_chars ):
            $chars .= '-_ []{}<>~`+=,.;:/?|';
        endif;

        $wp_generapass_password = ''; // Initialize the password string
        $password_length = 12;
        for ( $i = 0; $i < $password_length; $i += 1 ) {
            $wp_generapass_password .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
        }

        return apply_filters( 'random_password', $wp_generapass_password );
    }
endif;

function wp_generapass_style_password() {
    $wp_generapass_is_rtl = function_exists( 'is_rtl' ) && is_rtl() ? 'left' : 'right';
    echo "
    <style>
    .wp-generapass-show-password {
        float: $wp_generapass_is_rtl;
        font-size: 11px;
        margin: 0;
        padding-top: 5px;
        padding-$wp_generapass_is_rtl: 15px;
    }
    </style>
    ";
}

add_action( 'admin_head', 'wp_generapass_style_password' );

function wp_generapass_show_generated_password() {
    /*
     * Set the $inc_extra_special_chars to true if you want to include
     * the extra special characters.
    */
    $show_password = wp_generapass_generate_password( $inc_extra_special_chars = false );
    // Do not use _e, just use __ when using printf or sprintf
    printf(
        __( '<p class=\'wp-generapass-show-password\'>Generated&nbsp;Password:&nbsp;<strong>%s</strong></p>', 'wp-generate-password' ),
        $show_password
    );
}

add_action( 'admin_notices', 'wp_generapass_show_generated_password' );
