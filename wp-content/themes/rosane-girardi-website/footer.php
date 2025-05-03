</main>

<footer>
    <div class="logo-footer">
        <div class="box-svg">
            <?php $svg_file = get_field('logo_footer', 'options');
            if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                echo '<i class="element">';
                echo file_get_contents($svg_file['url']);
                echo '</i>';
            } ?>
        </div>
    </div>
    <div class="social">
        <?php
        if (have_rows('redes_sociais', 'options')) :
            while (have_rows('redes_sociais', 'options')) : the_row(); ?>
                <?php
                $link = get_sub_field('link_rede_sociais', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>
        <?php endwhile;
        endif; ?>
    </div>
    <div class="signature">
        © <?php echo date('Y'); ?> Rosane Girardi • Designed by <a href="https://www.dzigual.com.br">DZIGUAL</a>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.filtro-btn');
        const listaPost = document.querySelector('.lista-post');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const clickedLi = button.closest('li');
                const wasActive = clickedLi.classList.contains('active');
                const slug = button.dataset.slug;

                // Remove 'active' de todos os <li>
                document.querySelectorAll('.filtro-taxonomias li').forEach(li => li.classList
                    .remove('active'));

                // Se já estava ativo, desativa e remove o filtro
                let filtroSlug = '';
                if (!wasActive) {
                    clickedLi.classList.add('active');
                    filtroSlug = slug;
                }

                const baseUrl = '<?php echo get_post_type_archive_link("projetos"); ?>';
                const newUrl = filtroSlug ? `${baseUrl}?modelo=${filtroSlug}` : baseUrl;
                window.history.pushState(null, '', newUrl);

                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            action: 'filtrar_projetos',
                            modelo: filtroSlug
                        })
                    })
                    .then(res => res.text())
                    .then(data => {
                        listaPost.classList.add('fade-out');

                        setTimeout(() => {
                            listaPost.innerHTML = data;
                            listaPost.classList.remove('fade-out');
                            listaPost.classList.add('fade-in');

                            setTimeout(() => {
                                listaPost.classList.remove('fade-in');
                            }, 300);
                        }, 300);
                    });
            });
        });

        // Ativar botão com base na URL ao carregar a página
        const urlParams = new URLSearchParams(window.location.search);
        const currentSlug = urlParams.get('modelo');

        if (currentSlug) {
            document.querySelectorAll('.filtro-btn').forEach(button => {
                if (button.dataset.slug === currentSlug) {
                    button.closest('li').classList.add('active');
                }
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {});
</script>


<?php wp_footer(); ?>
</body>

</html>