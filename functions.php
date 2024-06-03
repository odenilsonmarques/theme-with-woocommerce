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




//estamo disparando uma ação dentro do gancho woocommerce_before_main-content e woocommerce_after_main_content
// dentro desses ganchos vamos ter as funcões que irao abrir e fechar container e a linha
function loja_lab_open_container_row()
{
	echo '<div class="container shop-content"><div class="row">';
}
add_action('woocommerce_before_main_content', 'loja_lab_open_container_row',5);


function loja_lab_close_container_row()
{
	echo '</div></div>';
}
add_action('woocommerce_after_main_content', 'loja_lab_close_container_row',5);





//precisamos remover o sidebar da posição atual e levá-lo para dentro do nosso container declarado acima
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

//agora precisamos inserir o sidebar dentro do container
add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);

// agora precisamos inserir o sidebar dentro das colunas e fechar 
function loja_lab_add_sidebar_tags()
{
	echo '<div class="sidebar-shop col-lg-3 order-2 order-md-1">';
}
add_action('woocommerce_before_main_content', 'loja_lab_add_sidebar_tags', 6);

function loja_lab_close_sidebar_tags()
{
	echo '</div>';
}
add_action('woocommerce_before_main_content', 'loja_lab_close_sidebar_tags', 8);

// adicionamos também a div primary dentro das colunas
function loja_lab_add_shop_tags(){
	echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
}
add_action( 'woocommerce_before_main_content', 'loja_lab_add_shop_tags', 9 );

function loja_lab_close_shop_tags(){
	echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'loja_lab_close_shop_tags', 4 );





