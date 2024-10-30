<?php

function safely_add_stylesheet() {
    wp_enqueue_style( 'cookies-pro-style', plugins_url('css/Cookies_Pro.css', __FILE__) );
}

add_action( 'wp_enqueue_scripts', 'safely_add_stylesheet' );

function my_scripts_method()
{
	wp_enqueue_script('jquerycookie', plugins_url('js/jquery.cookie.js', __FILE__), array('jquery'));
	wp_enqueue_script('cookiespro', plugins_url('js/Cookies_Pro.js', __FILE__), array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('css/wp-admin.css', __FILE__));
    wp_enqueue_script('validation', plugins_url('js/script.validacionInput.js', __FILE__), array('jquery'));
}

add_action('admin_enqueue_scripts', 'my_admin_theme_style');

?>