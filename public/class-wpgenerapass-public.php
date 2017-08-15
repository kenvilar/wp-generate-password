<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/kenvilar
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
	
	public static function wpgenerapass_shortcode( $atts, $content = null ) {
		
		$atts = shortcode_atts(
			array(
				'number'        => 16,
				'special-chars' => 'yes',
			),
			$atts,
			'wpgenerapass'
		);
		
		if ( $atts[ 'number' ] === "" ) {
			$atts[ 'number' ] = 16;
		}
		
		$wpgenerapass_shortcode_error_allowed_tags = array(
			'p' => array(
				'class' => array(),
			),
		);
		
		if ( (int) $atts[ 'number' ] < 4 && function_exists( 'wp_kses' ) ) :
			
			$display_att_num_error = 'Oops! You entered a number less than 4. ';
			$display_att_num_error .= 'The minimum limit of a password characters is 4.';
			$display_att_num_error = sprintf(
				'<p class="wpgenerapass-shortcode-error">%s</p>',
				esc_html__( $display_att_num_error, 'wp-generate-password' )
			);
			
			return wp_kses( $display_att_num_error, $wpgenerapass_shortcode_error_allowed_tags );
		
		elseif ( $atts[ 'number' ] > 100 && function_exists( 'wp_kses' ) ) :
			
			$display_att_num_error = 'Oops! You entered a number greater than 100. ';
			$display_att_num_error .= 'The maximum limit of a password characters is 100.';
			$display_att_num_error = sprintf(
				'<p class="wpgenerapass-shortcode-error">%s</p>',
				esc_html__( $display_att_num_error, 'wp-generate-password' )
			);
			
			return wp_kses( $display_att_num_error, $wpgenerapass_shortcode_error_allowed_tags );
		
		endif;
		
		$chars = 'abcdefghijklmnopqrstuvwxyz';
		$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$chars .= '0123456789';
		
		if ( $atts[ 'special-chars' ] === 'yes' || $atts[ 'special-chars' ] === "" ) {
			$chars .= '!@#$%^&*()';
		}
		
		$display_wpgenerapass_shortcode = '<div class="display-public-wpgenerapass">';
		
		if ( isset( $content ) && $content !== "" ) {
			$content                        = esc_html__( $content, 'wp-generate-password' );
			$display_wpgenerapass_shortcode .= '<span class="display-public-wpgenerapass-text">' . $content . ': </span>';
		}
		
		$display_wpgenerapass_shortcode .= '<span class="display-public-wpgenerapass-password-text">';
		
		$charsStringLen = strlen( $chars ) - 1;
		for ( $i = 0; $i < $atts[ 'number' ]; $i++ ) {
			$display_wpgenerapass_shortcode .= substr( $chars, wp_rand( 0, $charsStringLen ), 1 );
		}
		
		$display_wpgenerapass_shortcode .= '</span></div>';
		
		$display_wpgenerapass_shortcode_allowed_tags = array(
			'div'  => array(
				'class' => array(),
			),
			'span' => array(
				'class' => array(),
				'id'    => array(),
			),
		);
		
		return wp_kses( $display_wpgenerapass_shortcode, $display_wpgenerapass_shortcode_allowed_tags );
	}
	
}
