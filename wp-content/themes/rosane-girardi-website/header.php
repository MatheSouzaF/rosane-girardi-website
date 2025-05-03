<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(""); ?>>
    <nav>
        <div class="menu-wrapper">
            <a class="logo-link" href="<?php echo esc_url(home_url('/')); ?>">
                <div class="box-svg">
                    <?php $svg_file = get_field('logo_desktop', 'options');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                </div>
            </a>

            <ul class="menu">
                <!-- <div class="close-menu -mobile">
                    <img src="img/close-menu.svg" alt="">
                </div> -->

                <li class="filter mobile-off">
                    <?php
                    $link = get_field('link_projetos', 'options');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="projects" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                    <?php endif; ?>
                    <div class="option">
                        <?php
                        if (have_rows('projetos', 'options')) :
                            while (have_rows('projetos', 'options')) : the_row(); ?>
                        <?php
                                $link = get_sub_field('links_projetos', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a class="" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>">
                            <p class=""><?php echo esc_html($link_title); ?></p>
                        </a>
                        <?php endif; ?>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </li>
                <li class="mobile-off">
                    <?php
                    $link = get_field('link_escritorio', 'options');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                    <?php endif; ?>
                </li>
                <li class="mobile-off">
                    <a href="">
                        <?php
                        $link = get_field('link_contato', 'options');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a class="" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>">
                            <p class=""><?php echo esc_html($link_title); ?></p>
                        </a>
                        <?php endif; ?>
                    </a>
                </li>
                <div class="box-navbar">

                    <label for="menu-toggle" id="btn-active" class="navigation__menu-label">
                        <span class="navigation__label-bar navigation__label-bar1 "></span>
                        <span class="navigation__label-bar navigation__label-bar2"></span>
                        <span class="navigation__label-bar navigation__label-bar3"></span>
                    </label>

                    <ul class="sidebar">
                        <a class="logo-link-sidebar" href="<?php echo esc_url(home_url('/')); ?>">
                            <div class="box-svg">
                                <?php $svg_file = get_field('logo_desktop', 'options');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">';
                                    echo file_get_contents($svg_file['url']);
                                    echo '</i>';
                                } ?>
                            </div>
                        </a>
                        <div class="box-links-sidebar">
                            <li class="filter">
                                <?php
                                $link = get_field('link_projetos', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a class="projects" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>">
                                    <p class="link-menu"><?php echo esc_html($link_title); ?></p>
                                </a>
                                <?php endif; ?>
                                <?php
                                if (have_rows('projetos', 'options')) :
                                    while (have_rows('projetos', 'options')) : the_row(); ?>
                                <?php
                                        $link = get_sub_field('links_projetos', 'options');
                                        if ($link) :
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a class="" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>">
                                    <p class="link-menu modelos"><?php echo esc_html($link_title); ?></p>
                                </a>
                                <?php endif; ?>
                                <?php endwhile;
                                endif; ?>
                            </li>
                            <li class="">
                                <?php
                                $link = get_field('link_escritorio', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a class="" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>">
                                    <p class="link-menu"><?php echo esc_html($link_title); ?></p>
                                </a>
                                <?php endif; ?>
                            </li>
                            <li class="">
                                <a href="">
                                    <?php
                                    $link = get_field('link_contato', 'options');
                                    if ($link) :
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a class="" href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>">
                                        <p class="link-menu"><?php echo esc_html($link_title); ?></p>
                                    </a>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>


            </ul>
        </div>
        <div class="mask-left-top"></div>
        <div class="mask-right-top"></div>
        <div class="mask-left-bottom"></div>
    </nav>

    <main>