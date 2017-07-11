<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://kenvilar.com
 * @since      1.0.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/public
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass_Public {

    private $plugin_name, $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

}
