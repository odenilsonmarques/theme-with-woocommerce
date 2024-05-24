<?php

function loja_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.0', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0', 'all');
    wp_enqueue_style('loja-style', get_stylesheet_uri(), array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'loja_scripts');


function loja_config()
{
    register_nav_menus(
        array(
            'loja_main_menu' => 'Main Menu',
            'loja_footer_menu' => 'Footer Menu'
        )
    );
}
add_action('after_setup_theme','loja_config', 0);