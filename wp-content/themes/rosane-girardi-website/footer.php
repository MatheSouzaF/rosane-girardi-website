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
            const slug = button.dataset.slug;
            // Remove a classe active de todos os botões
            // Remove 'active' de todos os <li>
            document.querySelectorAll('.filtro-taxonomias li').forEach(li => li.classList
                .remove('active'));

            // Adiciona 'active' no <li> pai do botão clicado
            button.closest('li').classList.add('active');


            // Atualiza a URL sem recarregar
            const newUrl = slug ? `?projeto=${slug}` :
                '<?php echo get_post_type_archive_link('projetos'); ?>';
            window.history.pushState(null, '', newUrl);

            // Faz a requisição AJAX
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'filtrar_projetos',
                        modelo: slug
                    })
                })
                .then(res => res.text())
                .then(data => {
                    // Adiciona o fade-out
                    listaPost.classList.add('fade-out');

                    setTimeout(() => {
                        // Atualiza os projetos
                        listaPost.innerHTML = data;

                        // Remove fade-out e aplica fade-in
                        listaPost.classList.remove('fade-out');
                        listaPost.classList.add('fade-in');

                        // Remove fade-in depois da animação
                        setTimeout(() => {
                            listaPost.classList.remove('fade-in');
                        }, 300);
                    }, 300);
                });

        });
    });
});
</script>


<?php wp_footer(); ?>
</body>

</html>