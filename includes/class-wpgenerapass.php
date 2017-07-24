<?php

/**
 * The core plugin class.
 *
 * This is used to define
 *      - internationalization,
 *      - admin-specific hooks, and
 *      - public-facing site hooks.
 *
 * @link       http://kenvilar.com
 * @since      1.1.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/includes
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass {
	
	// var $loader Maintains and registers all hooks for the plugin.
	// var $plugin_name Name identifier of this plugin
	// var $version Version of the plugin
	protected $loader, $plugin_name, $version;
	
	// Core functionality
	public function __construct() {
		$this->plugin_name = WPGENERAPASS_NAME;        // Plugin Name
		$this->version     = WPGENERAPASS_VERSION;     // Plugin Version
		
		$this->load_dependencies();                     // Load the dependencies
		$this->set_locale();                            // Define the locale
		$this->define_admin_hooks();                    // Set the hooks for the admin area
		$this->define_public_hooks();                   // Public-facing site hooks
	}
	
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpgenerapass-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpgenerapass-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpgenerapass-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wpgenerapass-public.php';
		
		// Set Loader class to $this->loader and you can use this to other functions within a class
		$this->loader = new WPGeneraPass_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new WPGeneraPass_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new WPGeneraPass_Admin( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		// Generate Password hooks
		$this->loader->add_action( 'admin_head', $plugin_admin, 'wpgenerapass_style_password' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'wpgenerapass_show_generated_password' );
	}
	
	private function define_public_hooks() {
		$plugin_public = new WPGeneraPass_Public( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		// Add hook for WP Generated Password shortcode tag
		add_shortcode( 'wpgenerapass', array( 'WPGeneraPass_Public', 'wpgenerapass_shortcode' ) );
	}
	
	public function run() {
		$this->loader->run();
	}
	
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	
	public function get_version() {
		return $this->version;
	}
	
	public function get_loader() {
		return $this->loader;
	}
	
}
