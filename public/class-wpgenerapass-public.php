<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://kenvilar.com
 * @since      1.1.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/public
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass_Public {
	
	private $plugin_name, $version;
	
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}
	
	public function enqueue_styles() {
		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'css/wpgenerapass-public.css',
			array(),
			$this->version,
			'all'
		);
	}
	
	public function enqueue_scripts() {
		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/wpgenerapass-public.js',
			array( 'jquery' ),
			$this->version,
			false
		);
	}
	
	function wpgenerapass_shortcode( $atts ) {
		
		$atts = shortcode_atts(
			array(
				'num-chars'   => '16',
				'with-chars' => 'yes',
			),
			$atts,
			'wpgenerapass'
		);
		
	}
	
}
