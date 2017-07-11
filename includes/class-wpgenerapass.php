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
 * @since      1.0.0
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
        $this->plugin_name = 'wp-generate-password';    // Plugin Name
        $this->version = '1.0.0';                       // Plugin Version

        $this->load_dependencies();                     // Load the dependencies
        $this->set_locale();                            // Define the locale
        $this->define_admin_hooks();                    // Set the hooks for the admin area
        $this->define_public_hooks();                   // Public-facing site hooks
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpgenerapass-loader.php' ;
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpgenerapass-i18n.php' ;
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpgenerapass-admin.php' ;
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wpgenerapass-public.php' ;
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

}
