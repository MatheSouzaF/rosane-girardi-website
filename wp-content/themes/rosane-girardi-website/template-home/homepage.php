<?php
//Template Name: Home
wp_enqueue_style('home', get_template_directory_uri() . '/assets/dist/css/home/home.css', ['main'], ASSETS_VERSION);

get_header();

?>

<div id="swup" class="swiper slider1 transition-fade">
    <div class="swiper-wrapper">
        <?php
        if (have_rows('slides')) :
            while (have_rows('slides')) : the_row(); ?>
        <div data-aos="fade-left" class="swiper-slide">
            <div class="project-name"><?php the_sub_field('titulo_slides'); ?></div>
            <?php
                    $image = get_sub_field('imagem_desktop');
                    if ($image) :
                        $image_url = $image['url'];
                        $image_alt = $image['alt']; ?>
            <img class="products" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
                    $image = get_sub_field('imagem_mobile');
                    if ($image) :
                        $image_url = $image['url'];
                        $image_alt = $image['alt']; ?>
            <img class="products-mobile" src="<?php echo esc_url($image_url); ?>"
                alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
        <?php endwhile;
        endif; ?>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<?php get_footer() ?>