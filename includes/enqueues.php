<?php
// function my_vue_plugin_enqueues()
// {
//     // wp_enqueue_script('my_vuejs_plugin', plugin_dir_url(__DIR__) . '/dist/bundle.js', array(), null, true);
//     wp_enqueue_script('my_vuejs_plugin', plugin_dir_url(__DIR__) . '/dist/bundle.js', array(), time(), true);
// }
// add_action('wp_enqueue_scripts', 'my_vue_plugin_enqueues');
function my_vue_plugin_enqueues()
{
    // Check if in development mode

    if (defined('WP_DEBUG') && WP_DEBUG) {
        // Load the script from Webpack Dev Server
        wp_enqueue_script('my-vuejs-plugin-dev', 'http://localhost:9000/bundle.js', array(), null, true);
    } else {
        // Load the built script for production
        wp_enqueue_script('my-vuejs-plugin', plugin_dir_url(__DIR__) . '/dist/bundle.js', array(), '1.0', true);
    }

    // if (strpos($_SERVER['HTTP_HOST'], '.local') !== false) {
    //     // Load the script from Webpack Dev Server
    //     wp_enqueue_script('my-vuejs-plugin-dev', 'http://localhost:9000/bundle.js', array(), null, true);
    // } else {
    //     // Load the built script for production
    //     wp_enqueue_script('my-vuejs-plugin', plugin_dir_url(__DIR__) . '/dist/bundle.js', array(), '1.1', true);
    // }
}
add_action('wp_enqueue_scripts', 'my_vue_plugin_enqueues');