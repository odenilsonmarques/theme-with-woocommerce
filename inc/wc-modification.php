<?php
/*
funções para alterar o visual da loja padrao do woocommerce.
Isso é possivel porque fazemos chamadas diretas no ganchos 
padrao do woocommerce e nao precisamos alterar mexer em nenhuma 
linha do arquivo original . Lembrando que ela e chamada no fucntion 
*/


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



// a funcção abaixo retorna o resumo do post caso ele exista. No nosso caso vai trazer um resumo do produto
add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);