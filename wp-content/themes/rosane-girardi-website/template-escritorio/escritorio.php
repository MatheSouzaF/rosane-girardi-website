<?php
//Template Name: Escritório
wp_enqueue_style('escritorio', get_template_directory_uri() . '/assets/dist/css/escritorio/escritorio.css', ['main'], ASSETS_VERSION);

get_header(); ?>
<section class="office">


    <div class="banner">
        <?php
        $image = get_field('imagem_banner');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>
    </div>

    <div id="swup" class="transition-fade swup">

        <div class="description">
            <div class="left">
                <h2>
                    <?php echo get_field('titulo_descricao'); ?>
                </h2>
                <p>
                    <?php echo get_field('texto_descricao'); ?>
                </p>

            </div>

            <div class="right-image">
                <?php
                $image = get_field('imagem_descricao');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
            </div>
        </div>


        <div class="position-relative marquee-container d-sm-block">
            <div class="marquee d-flex justify-content-around">
                <h2>
                    <?php echo get_field('texto_animado'); ?>
                    <?php echo get_field('texto_animado'); ?>
                </h2>
            </div>
        </div>

        <div class="team-grid">
            <?php
            if (have_rows('time')) :
                while (have_rows('time')) : the_row(); ?>
            <div class="team-item">
                <?php
                        $image = get_sub_field('imagem_time');
                        if ($image) :
                            $image_url = $image['url'];
                            $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
                <div class="team-name"><?php echo get_sub_field('nome_time'); ?></div>
            </div>
            <?php endwhile;
            endif; ?>

        </div>


        <div class="service">
            <div></div>
            <div class="list">
                <h2><?php echo get_field('titulo_servicos'); ?></h2>
                <ul>
                    <?php
                    if (have_rows('repetidor_servicos')) :
                        while (have_rows('repetidor_servicos')) : the_row(); ?>
                    <li><?php echo get_sub_field('item_servicos'); ?></li>
                    <?php endwhile;
                    endif; ?>

                </ul>
            </div>
        </div>

    </div>
</section>

<?php get_footer() ?>