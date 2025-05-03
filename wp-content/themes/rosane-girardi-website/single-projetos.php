<?php
wp_enqueue_style('single', get_template_directory_uri() . '/assets/dist/css/archive-projetos/single-projeto.css', ['main'], ASSETS_VERSION);

get_header(); ?>

<section class="projeto">

    <div class="banner">
        <?php
        // Chamar a imagem do ACF para o post atual
        $image = get_field('banner_imagem_desktop');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>
        <div class="mask"></div>
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>

    <div id="swup" class="transition-fade swup">

        <div class="description">
            <p>
                <?php echo get_field('descricao'); ?>
            </p>

            <div class="list">
                <ul>
                    <?php
                    if (have_rows('lista_descricao')) :
                        while (have_rows('lista_descricao')) : the_row(); ?>
                            <li><?php echo get_sub_field('item_lista'); ?></li>
                    <?php endwhile;
                    endif; ?>

                </ul>
            </div>
        </div>


        <div class="box-galeria">
            <?php
            if (have_rows('galeiria_de_imagens')) :
                while (have_rows('galeiria_de_imagens')) : the_row();
                    // Verificar se o campo 'imagem_metade' está marcado como true
                    $add_class = get_sub_field('imagem_metade') ? 'row-img' : '';
                    $imagem = get_sub_field('imagens');
                    if ($imagem) : ?>
                        <a class="imagem-galeria <?php echo esc_attr($add_class); ?>" href="<?php echo esc_url($imagem['url']); ?>"
                            data-fancybox="galeria-collection">
                            <img class="imgGrow" src="<?php echo esc_url($imagem['url']); ?>"
                                alt="<?php echo esc_attr($imagem['alt']); ?>">
                        </a>
            <?php
                    endif;
                endwhile;
            endif;
            ?>
        </div>



    </div>


    <div class="see-more">
        <a href="/projetos">Ver todos os projetos</a>
    </div>

    </div>
</section>

<?php get_footer() ?>