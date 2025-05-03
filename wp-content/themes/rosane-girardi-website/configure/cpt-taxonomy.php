<?php

// Registrar o Custom Post Type "projetos"
function register_cpt_projetos()
{
    $labels = [
        'name'               => 'Projetos',
        'singular_name'      => 'Projeto',
        'menu_name'          => 'Projetos',
        'name_admin_bar'     => 'Projeto',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Projeto',
        'new_item'           => 'Novo Projeto',
        'edit_item'          => 'Editar Projeto',
        'view_item'          => 'Ver Projeto',
        'all_items'          => 'Todos os Projetos',
        'search_items'       => 'Buscar Projetos',
        'not_found'          => 'Nenhum projeto encontrado.',
        'not_found_in_trash' => 'Nenhum projeto encontrado na lixeira.',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'projetos'],
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'show_in_rest'       => true,
    ];

    register_post_type('projetos', $args);
}
add_action('init', 'register_cpt_projetos');

// Registrar a taxonomia "modelo" para o CPT "projetos"
function register_taxonomy_modelo()
{
    $labels = [
        'name'              => 'Modelos',
        'singular_name'     => 'Modelo',
        'search_items'      => 'Buscar Modelos',
        'all_items'         => 'Todos os Modelos',
        'parent_item'       => 'Modelo Pai',
        'parent_item_colon' => 'Modelo Pai:',
        'edit_item'         => 'Editar Modelo',
        'update_item'       => 'Atualizar Modelo',
        'add_new_item'      => 'Adicionar Novo Modelo',
        'new_item_name'     => 'Novo Nome do Modelo',
        'menu_name'         => 'Modelos',
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'modelo'],
    ];

    register_taxonomy('modelo', ['projetos'], $args);
}
add_action('init', 'register_taxonomy_modelo');