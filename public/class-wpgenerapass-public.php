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
		
		if ( ! isset( $atts[ 'number' ] ) && function_exists( 'wp_kses' ) ) :
			$display_att_num_error = 'You must provide a number of characters for this shortcode to work. ';
			$display_att_num_error .= 'For example, [wpgenerapass number="16"]. ';
			$display_att_num_error .= 'This will generate 16 characters of password.';
			
			return sprintf(
				wp_kses(
					__( '<p class="shortcode-error">%s</p>', 'wp-generate-password' ),
					array(
						'p' => array(
							'class' => array(),
						),
					)
				),
				$display_att_num_error
			);
		elseif ( (int) $atts[ 'number' ] < 4 && function_exists( 'wp_kses' ) ) :
			$display_att_num_error = 'Oops! You entered a number less than 4. ';
			$display_att_num_error .= 'The minimum limit of the password characters is 4.';
			
			return sprintf(
				wp_kses(
					__( '<p class="shortcode-error">%s</p>', 'wp-generate-password' ),
					array(
						'p' => array(
							'class' => array(),
						),
					)
				),
				$display_att_num_error
			);
		elseif ( $atts[ 'number' ] > 100 && function_exists( 'wp_kses' ) ) :
			$display_att_num_error = 'Oops! You entered a number greater than 100. ';
			$display_att_num_error .= 'The maximum limit of the password characters is 100.';
			
			return sprintf(
				wp_kses(
					__( '<p class="shortcode-error">%s</p>', 'wp-generate-password' ),
					array(
						'p' => array(
							'class' => array(),
						),
					)
				),
				$display_att_num_error
			);
		endif;
		
		if ( ! isset( $atts[ 'special-chars' ] ) && function_exists( 'wp_kses' ) ) :
			$display_special_chars_error = 'You must provide a value of "yes" or "no" if you want to enable the ';
			$display_special_chars_error .= 'special characters to include in this shortcode. ';
			$display_special_chars_error .= 'For example, [wpgenerapass special-chars="yes"]. ';
			$display_special_chars_error .= 'This will generate a password including special characters.';
			
			return sprintf(
				wp_kses(
					__( '<p class="shortcode-error">%s</p>', 'wp-generate-password' ),
					array(
						'p' => array(
							'class' => array(),
						),
					)
				),
				$display_special_chars_error
			);
		endif;
		
		$atts = shortcode_atts(
			array(
				'number'        => 16,
				'special-chars' => 'yes',
			),
			$atts,
			'wpgenerapass'
		);
		
		if ( empty( $atts[ 'number' ] ) ) {
			$atts[ 'number' ] = 16;
		}
		
		$atts[ 'special-chars' ] === 'yes' ? true : false;
		
		$chars = 'abcdefghijklmnopqrstuvwxyz';
		$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$chars .= '0123456789';
		
		if ( $atts[ 'special-chars' ] === 'yes' || $atts[ 'special-chars' ] === '' ) {
			$chars .= '!@#$%^&*()';
		}
		
		$display_wpgenerapass_shortcode = '<div class="display-public-wpgenerapass">';
		
		if ( ! empty( $content ) ) {
			$display_wpgenerapass_shortcode .= '<span class="display-public-wpgenerapass-text">' . esc_html__( $content, 'wp-generate-password' ) . ': </span>';
		}
		
		$display_wpgenerapass_shortcode .= '<span class="display-public-wpgenerapass-password-text">';
		
		for ( $i = 0; $i < $atts[ 'number' ]; $i++ ) {
			$display_wpgenerapass_shortcode .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
		}
		
		$display_wpgenerapass_shortcode .= '</span></div>';
		
		return $display_wpgenerapass_shortcode;
	}
	
}
