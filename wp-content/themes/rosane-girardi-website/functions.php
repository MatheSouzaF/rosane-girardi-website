<?php

// CPT TAXONOMY

include('configure/cpt-taxonomy.php');


// CONFIG

include('configure/configure.php');

// JAVASCRIPT & CSS

include('configure/js-css.php');

// SHORTCODES

include('configure/shortcodes.php');

// ACF

include('configure/acf.php');

// HOOKS ADMIN


if (is_admin()) {
	include('configure/admin.php');
}

add_action('wp_ajax_filtrar_projetos', 'ajax_filtrar_projetos');
add_action('wp_ajax_nopriv_filtrar_projetos', 'ajax_filtrar_projetos');

function ajax_filtrar_projetos()
{
	$modelo = isset($_POST['modelo']) ? sanitize_text_field($_POST['modelo']) : '';

	$args = [
		'post_type' => 'projetos',
		'posts_per_page' => -1,
	];

	if (!empty($modelo)) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'modelo',
				'field'    => 'slug',
				'terms'    => $modelo,
			]
		];
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		echo '<ul>';

		while ($query->have_posts()) {
			$query->the_post();

			$image = get_field('banner_imagem_desktop');
			$image_html = '';

			if ($image) {
				$image_url = esc_url($image['url']);
				$image_alt = esc_attr($image['alt']);
				$image_html = "<img src='{$image_url}' alt='{$image_alt}'>";
			}

			echo '<li>
					<a href="' . get_permalink() . '">
						' . $image_html . '
						<p>' . get_the_title() . '</p>
						<div class="mask"></div>
					</a>
				  </li>';
		}

		echo '</ul>';
	} else {
		echo '<p>Nenhum projeto encontrado.</p>';
	}

	wp_die();
}