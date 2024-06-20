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

	// Bootstrap Menu
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


	register_nav_menus(
		array(
			'loja_main_menu' => 'Main Menu',
			'loja_footer_menu' => 'Footer Menu'
		)
	);

	// as linhas abaixo significa que esse tema está declarando suporte ao woocommerce
	add_theme_support('woocommerce', array(
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
	));
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');

	//define o tamanho maximo de qualquer conteúdo no tema como as imagem adicionadas aos posts
	// uma vantagem ´que podemos adicionar imagens grandes aos post sem quebrar o conteúdo
	// Lembrar que foi copiado um css especifico . Declrarado como General
	if (!isset($content_width)) {
		$content_width = 600;
	}
}
add_action('after_setup_theme', 'loja_config', 0);


// Essa condição garante que mesmo desativando o plugin do woocommerce o tema continua funcionando.
// sem ela ao desativitar o plugin do woocommerce podemos ter problema no tema
if (class_exists('WooCommerce')) {
	// chamando o arquivo wc-modification
	require get_template_directory() . '/inc/wc-modification.php';
}






// trecho de código para aplicar o efeito no menu hamburguer. Lembreando que o menu ta abrindo mais na ta fechano, tentar arrumar isso
add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}