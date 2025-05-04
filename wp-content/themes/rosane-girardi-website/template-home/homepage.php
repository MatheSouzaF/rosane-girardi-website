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
    <div class="box-buttons">

        <svg class="swiper-button-next" xmlns="http://www.w3.org/2/svg" width="65" height="148" viewBox="0 0 65 148"
            fill="none">
            <path d="M3 2L60.5 74L3 146" stroke="white" stroke-width="6" />
        </svg>
        <svg class="swiper-button-prev" xmlns="http://www.w3.org/2000/svg" width="64" height="148" viewBox="0 0 64 148"
            fill="none">
            <path d="M61.5 2L4 74L61.5 146" stroke="white" stroke-width="6" />
        </svg>
    </div>
</div>

<?php get_footer() ?>