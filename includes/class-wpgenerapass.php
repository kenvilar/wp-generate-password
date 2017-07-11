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

    // Maintains and registers all hooks for the plugin.
    protected $loader;

    // Name identifier of this plugin.
    protected $plugin_name;

    // Version of the plugin
    protected $version;

    // Core functionality
    public function __construct() {

        $this->plugin_name = 'wp-generate-password';    // Plugin Name
        $this->version = '1.0.0';                       // Plugin Version

        $this->load_dependencies();                     // Load the dependencies
        $this->set_locale();                            // Define the locale
        $this->define_admin_hooks();                    // Set the hooks for the admin area
        $this->define_public_hooks();                   // Public-facing site hooks

    }

}
