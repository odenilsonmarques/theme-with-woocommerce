<?php

/**
 * Template for displaying search forms in Fancy Lab
 *
 * @package Fancy Lab
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'twentysixteen'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'twentysixteen'); ?></span></button>

	<!-- adicionando essa linha para garantir que o campo de busca traga somente itens relacionados a loja, pois como ta hoje, está trazendo todos tipo de postagem -->
	<!-- alem disso, estamos fazendo uma condição para que essa funcionalidade só esteja ativa se o plugin do woocommerce estiver ativado, caso contrário segue o comportamento padrao-->
	<?php if (class_exists('WooCommerce')) : ?>
		<input type="hidden" value="product" name="post_type" id="post_type">
	<?php endif; ?>
</form>