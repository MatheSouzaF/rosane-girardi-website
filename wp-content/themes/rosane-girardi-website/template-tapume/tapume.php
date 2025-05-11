<?php
//Template Name: Tapume
wp_enqueue_style('tapume', get_template_directory_uri() . '/assets/dist/css/tapume/tapume.css', ['main'], ASSETS_VERSION);

get_header(); ?>

<div id="swup" class="swiper slider1 transition-fade">
    <div class="swiper-wrapper">

        <div class="swiper-slide">
            <div class="project-name">Hangar Latitude, PY</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/01.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Studio SP</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/02.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Garden Cachoeira</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/03.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Mostra Artefacto 2022 | Natureza Modernista</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/04.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Casa Jurerê In III</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/05.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Escritório de Advocacia II</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/06.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Portal do Itacorubi</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/07.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Casa Assuncion</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/08.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Casa Cor 2017 | Um Estar para Todos</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/09.webp" alt="">
        </div>

        <div class="swiper-slide">
            <div class="project-name">Costa do Sol</div>
            <img class="products" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/10.webp" alt="">
        </div>

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>


<?php get_footer() ?>