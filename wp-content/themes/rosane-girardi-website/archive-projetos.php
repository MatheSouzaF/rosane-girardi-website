<?php
wp_enqueue_style('archive', get_template_directory_uri() . '/assets/dist/css/archive-projetos/projetos.css', ['main'], ASSETS_VERSION);

get_header();
?>

<div class="projetos-list">
    <div class="filtro-taxonomias">
        <?php
        $current_slug = isset($_GET['modelo']) ? $_GET['modelo'] : '';
        ?>

        <ul>
            <li class="<?php echo $current_slug === '' ? 'active' : ''; ?>">
                <button class="filtro-btn" data-slug="">Todos</button>
            </li>

            <?php
            $modelos = get_terms([
                'taxonomy' => 'modelo',
                'hide_empty' => true,
            ]);

            foreach ($modelos as $modelo) :
                $is_active = $modelo->slug === $current_slug ? 'active' : '';
            ?>
            <li class="<?php echo esc_attr($is_active); ?>">
                <button class="filtro-btn" data-slug="<?php echo esc_attr($modelo->slug); ?>">
                    <?php echo esc_html($modelo->name); ?>
                </button>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>

    <div class="lista-post">
        <?php if (have_posts()) : ?>
        <ul>
            <?php while (have_posts()) : the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php
                            // Chamar a imagem do ACF para o post atual
                            $image = get_field('banner_imagem_desktop');
                            if ($image) :
                                $image_url = $image['url'];
                                $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php endif; ?>
                    <p>
                        <?php the_title(); ?>
                    </p>
                    <div class="mask"></div>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>