<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://kenvilar.com
 * @since      1.0.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/admin
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass_Admin {

    private $plugin_name, $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'css/wpgenerapass-admin.css',
            array(),
            $this->version,
            'all'
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/wpgenerapass-admin.js',
            array( 'jquery' ),
            $this->version,
            false
        );
    }

}
