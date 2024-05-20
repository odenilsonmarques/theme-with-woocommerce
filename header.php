<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loja</title>
    <!-- a funcão wp_head carrega os script que ficam no cabeçalho, sem ela nao é possivel carregá-los -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="search">
                <div class="container">
                    Pesquisa
                </div>
            </section>
            <section class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="brand col-3">Logo</div>
                        <div class="second-column col-9">
                            <div class="account">Conta</div>
                            <div class="main-menu">Menu</div>
                        </div>
                    </div>
                </div>
            </section>
        </header>