<?php

/**
 * Register all actions and filters for the plugin.
 *
 * @link       http://kenvilar.com
 * @since      1.1.0
 * @package    Wp_Generate_Password
 * @subpackage Wp_Generate_Password/includes
 * @author     Ken Vilar <kenvilar@gmail.com>
 */
class WPGeneraPass_Loader {

    // Array of actions and filters
    protected $actions, $filters;

    public function __construct() {
        $this->actions = array();
        $this->filters = array();
    }

    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $addToOne = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
        $this->actions = $addToOne;
    }

    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $addToOne = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
        $this->filters = $addToOne;
    }

    private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args,
        );

        return $hooks;
    }

    // Register filters and actions
    public function run() {
        foreach ( $this->filters as $hook ) {
            add_filter(
                $hook['hook'],
                array( $hook['component'], $hook['callback'], ),
                $hook['priority'],
                $hook['accepted_args']
            );
        }

        foreach ( $this->actions as $hook ) {
            add_action(
                $hook['hook'],
                array( $hook['component'], $hook['callback'], ),
                $hook['priority'],
                $hook['accepted_args']
            );
        }
    }

}
