<footer>
    <section class="footer-widgets">
        <div class="container">
            <div class="row">Widgets do rodapé</div>
        </div>
    </section>
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="copyright-text col-12 col-md-6">Copyright</div>
                <div class="footer-menu col-12 col-md-6 text-left text-md-end">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'    => 'loja_footer_menu'
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
</footer>
</div>
<!-- a funcão wp_footer carrega os script que ficam no rodapé, sem ela nao é possivel carregá-los -->
<?php wp_footer(); ?>
</body>
</html>