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
	
	public function wpgenerapass_shortcode( $atts, $content = null ) {
		
		if ( ! isset( $atts[ 'number' ] ) ) {
			return '<p class="shortocde-error">You must provide a number of characters for this shortcode to work.</p>';
		}
		
		if ( ! isset( $atts[ 'special-chars' ] ) ) {
			return '<p class="shortocde-error">You must provide value of yes or no if you want to enable the special characters to incude in this shortcode.</p>';
		}
		
		$atts = shortcode_atts(
			array(
				'number'        => '16',
				'special-chars' => 'yes',
			),
			$atts,
			'wpgenerapass'
		);
		
		$atts[ 'special-chars' ] === 'yes' ? true : false;
		
		$chars = 'abcdefghijklmnopqrstuvwxyz';
		$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$chars .= '0123456789';
		
		if ( $atts[ 'special-chars' ] === 'yes' ) {
			$chars .= '!@#$%^&*()';
		}
		
		$wpgenerapass_password = '<div class="display-public-wpgenerapass">';
		
		if ( ! empty( $content ) ) {
			$wpgenerapass_password .= '<span class="display-public-wpgenerapass-text">' . $content . ': </span>';
		}
		
		$wpgenerapass_password .= '<span class="display-public-wpgenerapass-password-text">';
		
		for ( $i = 0; $i < $atts[ 'number' ]; $i++ ) {
			$wpgenerapass_password .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
		}
		
		$wpgenerapass_password .= '</span></div>';
		
		return $wpgenerapass_password;
	}
	
}
