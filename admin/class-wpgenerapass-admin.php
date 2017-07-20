<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://kenvilar.com
 * @since      1.1.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/admin
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass_Admin {
	
	private $plugin_name, $version;
	
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
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
	
	/*
	 * Start generate password
	 */
	// This is the function where the password is generated
	private function wpgenerapass_generate_password( $extra_special_chars = false ) {
		$chars = 'abcdefghijklmnopqrstuvwxyz';
		$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$chars .= '0123456789';
		$chars .= '!@#$%^&*()';
		
		if ( $extra_special_chars ):
			$chars .= '-_ []{}<>~`+=,.;:/?|';
		endif;
		
		$wpgenerapass_password = ''; // Initialize the password string
		$password_length       = 12;
		
		for ( $i = 0; $i < $password_length; $i += 1 ) {
			$wpgenerapass_password .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
		}
		
		return apply_filters( 'random_password', $wpgenerapass_password );
	}
	
	public function wpgenerapass_style_password() {
		$wpgenerapass_is_rtl = function_exists( 'is_rtl' ) && is_rtl() ? 'left' : 'right';
		echo '<style>.wpgenerapass-show-password{float:' . $wpgenerapass_is_rtl . ';padding-' . $wpgenerapass_is_rtl . ':15px;}</style>';
	}
	
	public function wpgenerapass_show_generated_password() {
		// Set the $inc_extra_special_chars to true if you want to include the extra special characters
		$show_password = $this->wpgenerapass_generate_password( $inc_extra_special_chars = false );
		
		$allowed_tags = array(
			'p'      => array(
				'class' => array(),
			),
			'strong' => array(),
		);
		
		// Do not use _e, just use __ when using printf or sprintf
		if ( function_exists( 'wp_kses' ) ) {
			printf(
				__(
					wp_kses(
						'<p class="wpgenerapass-show-password">Generated Password: <strong>%s</strong></p>',
						$allowed_tags
					),
					'wp-generate-password'
				),
				$show_password
			);
		}
	}
	/*
	 * End generate password
	 */
	
}
