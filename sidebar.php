<?php

/*
Plugin Name: Sidebar plugin
*/

function sidebar_plugin_register() {
    wp_register_script(
        'plugin-sidebar-js',
        plugins_url( 'plugin-sidebar.js', __FILE__ ),
        array( 'wp-plugins', 'wp-edit-post', 'wp-element' )
    );
}
