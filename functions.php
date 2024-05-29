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

    // as linhas abaixo significa que esse tema está declarando suporte ao woocommerce
    add_theme_support( 'woocommerce', array(
		'thumbnail_image_width'		=> 255,
		'single_image_width'		=> 255,
		'product_grid'				=> array(
	            'default_rows'    => 10,
	            'min_rows'        => 5,
	            'max_rows'        => 10,
	            'default_columns' => 1,
	            'min_columns'     => 1,
	            'max_columns'     => 1,			
		)
	) );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

    //define o tamanho maximo de qualquer conteúdo no tema como as imagem adicionadas aos posts
    // uma vantagem ´que podemos adicionar imagens grandes aos post sem quebrar o conteúdo
    // Lembrar que foi copiado um css especifico . Declrarado como General
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}
}
add_action('after_setup_theme','loja_config', 0);