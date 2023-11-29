<?php

/**
 * Plugin Name: My Vue Plugin
 * Description: A custom WordPress plugin with Vue.js integration.
 * Version: 1.0
 * Author: Your Name
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Enqueue scripts
require_once plugin_dir_path(__FILE__) . 'includes/enqueues.php';

// Shortcode Integration
function my_vue_plugin_shortcode()
{
    return '<div id="vue-app"></div>'; // Vue app will mount here
}
add_shortcode('my_vue_plugin', 'my_vue_plugin_shortcode');
