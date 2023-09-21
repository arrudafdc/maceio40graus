<?php

// Adiciona funcionalidades ao tema
function mcz_theme_support() {
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'mcz_theme_support');

// Registra os scripts e o css
function mcz_register_scripts() {
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', [], false, true);
  wp_register_script('popper', get_template_directory_uri() . '/js/popper.js', [], false, true);

  wp_enqueue_script('bootstrap');
  wp_enqueue_script('popper');
}
add_action('wp_enqueue_scripts', 'mcz_register_scripts');

function mcz_register_css(){
  wp_register_style('mcz-style', get_template_directory_uri() . '/scss/main.css', [], false, false);
  wp_enqueue_style('mcz-style');
}
add_action('wp_enqueue_scripts', 'mcz_register_css');

// Registra Menus
register_nav_menus([
  'header' => __('Menu do topo', 'mcz40-23'),
  'footer' => __('Menu do rodapé', 'mcz40-23'),
]);

//Customiza thumbs
function mcz_custom_size() {
  add_image_size('my-custom-thumb', 600, 600, true);
  add_image_size('mcz-thumb', 400, 201, true);
}
add_action('after_setup_theme', 'mcz_custom_size');

// Registra Fotos
function mcz_custom_post_type_fotos(){
  $labels = [
    'name' => _('Fotos'),
    'singular-name' => _X('Foto', 'Fotos de Maceió', 'mcz40-23'),
    'menu-name' => __('Fotos', 'mcz40-23'),
    'all_items' => __('Todos as coberturas', 'mcz40-23'),
    'view_item' => __('Ver coberturas', 'mcz40-23'),
    'add_new_item' => __('Adicionar cobertura', 'mcz40-23'),
    'add_new' => __('Adicionar novo', 'mcz40-23'),
    'edit_item' => __('Editar cobertura', 'mcz40-23'),
    'update_item' => __('Atualizar cobertura', 'mcz40-23'),
    'search_items' => __('Buscar cobertura', 'mcz40-23'),
    'not_found' => __('Não encontrado', 'mcz40-23'),
    'not_found_in_trash' => __('Não encontrado no lixo', 'mcz40-23')
  ];

  $args = [
    'label' => __('fotos', 'mcz40-23'),
    'description'=> __('Cobertura fotográfica', 'mcz40-23'),
    'labels' => $labels,
    'supports' => ['title', 'thumbnail', 'editor'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-camera',
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicy_queryable' => true,
    'capability_type' => 'post' 
  ];
  register_post_type('fotos', $args);
};
add_action('init', 'mcz_custom_post_type_fotos', 0);

// Registra Agenda
function mcz_custom_post_type_agenda(){
  $labels = [
    'name' => _('Agenda'),
    'singular-name' => _X('Agenda', 'Agenda cultural de Maceió', 'mcz40-23'),
    'menu-name' => __('Agenda', 'mcz40-23'),
    'all_items' => __('Todos os eventos', 'mcz40-23'),
    'view_item' => __('Ver Eventos', 'mcz40-23'),
    'add_new_item' => __('Adicionar evento', 'mcz40-23'),
    'add_new' => __('Adicionar novo', 'mcz40-23'),
    'edit_item' => __('Editar evento', 'mcz40-23'),
    'update_item' => __('Atualizar evento', 'mcz40-23'),
    'search_items' => __('Buscar evento', 'mcz40-23'),
    'not_found' => __('Não encontrado', 'mcz40-23'),
    'not_found_in_trash' => __('Não encontrado no lixo', 'mcz40-23')
  ];

  $args = [
    'label' => __('agenda', 'mcz40-23'),
    'description'=> __('Agenda cultural de Maceió', 'mcz40-23'),
    'labels' => $labels,
    'supports' => ['title', 'editor', 'thumbnail'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 7,
    'menu_icon' => 'dashicons-tickets-alt',
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicy_queryable' => true,
    'taxonomies'  => ['category'],
    'capability_type' => 'post' 
  ];
  register_post_type('agenda', $args);
};
add_action('init', 'mcz_custom_post_type_agenda', 0);

// Registra Notícias
function mcz_custom_post_type_noticias(){
  $labels = [
    'name' => _('Notícias'),
    'singular-name' => _X('Notícia', 'Notícia fresquinha', 'mcz40-23'),
    'menu-name' => __('Notícias', 'mcz40-23'),
    'all_items' => __('Todas as notícias', 'mcz40-23'),
    'view_item' => __('Ver Notícias', 'mcz40-23'),
    'add_new_item' => __('Adicionar notícia', 'mcz40-23'),
    'add_new' => __('Adicionar novo', 'mcz40-23'),
    'edit_item' => __('Editar notícia', 'mcz40-23'),
    'update_item' => __('Atualizar notícia', 'mcz40-23'),
    'search_items' => __('Buscar notícia', 'mcz40-23'),
    'not_found' => __('Não encontrado', 'mcz40-23'),
    'not_found_in_trash' => __('Não encontrado no lixo', 'mcz40-23')
  ];

  $args = [
    'label' => __('noticias', 'mcz40-23'),
    'description'=> __('Notícias fresquinhas', 'mcz40-23'),
    'labels' => $labels,
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 8,
    'menu_icon' => 'dashicons-format-aside',
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicy_queryable' => true,
    'capability_type' => 'post' 
  ];
  register_post_type('noticias', $args);
};
add_action('init', 'mcz_custom_post_type_noticias', 0);

// Registra carrossel de publicidade
function mcz_custom_post_type_carrossel_publi(){
  $labels = [
    'name' => _('Publicidade'),
    'menu-name' => __('Publicidade', 'mcz40-23'),
    'all_items' => __('Todas as publicidades', 'mcz40-23'),
    'view_item' => __('Ver publicidades', 'mcz40-23'),
    'add_new_item' => __('Adicionar publicidade', 'mcz40-23'),
    'add_new' => __('Adicionar novo', 'mcz40-23'),
    'edit_item' => __('Editar publicidade', 'mcz40-23'),
    'update_item' => __('Atualizar publicidade', 'mcz40-23'),
    'search_items' => __('Buscar publicidade', 'mcz40-23'),
    'not_found' => __('Não encontrado', 'mcz40-23'),
    'not_found_in_trash' => __('Não encontrado no lixo', 'mcz40-23')
  ];

  $args = [
    'label' => __('carrossel-publi', 'mcz40-23'),
    'description'=> __('Carrossel de publicidade', 'mcz40-23'),
    'labels' => $labels,
    'supports' => ['title', 'editor', 'thumbnail'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 9,
    'menu_icon' => 'dashicons-money-alt',
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicy_queryable' => true,
    'capability_type' => 'post' 
  ];
  register_post_type('carrossel-publi', $args);
};
add_action('init', 'mcz_custom_post_type_carrossel_publi', 0);

// Registra carrossel principal
function mcz_custom_post_type_destaques(){
  $labels = [
    'name' => _('Destaques --- (1300 x 400)'),
    'menu-name' => __('Destaques', 'mcz40-23'),
    'all_items' => __('Todas os destaques', 'mcz40-23'),
    'view_item' => __('Ver destaques', 'mcz40-23'),
    'add_new_item' => __('Adicionar destaque', 'mcz40-23'),
    'add_new' => __('Adicionar destaque', 'mcz40-23'),
    'edit_item' => __('Editar destaque', 'mcz40-23'),
    'update_item' => __('Atualizar destaque', 'mcz40-23'),
    'search_items' => __('Buscar destaque', 'mcz40-23'),
    'not_found' => __('Não encontrado', 'mcz40-23'),
    'not_found_in_trash' => __('Não encontrado no lixo', 'mcz40-23')
  ];

  $args = [
    'label' => __('destaques', 'mcz40-23'),
    'description'=> __('Carrossel dos destaques', 'mcz40-23'),
    'labels' => $labels,
    'supports' => ['title', 'thumbnail'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-visibility',
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicy_queryable' => true,
    'capability_type' => 'post' 
  ];
  register_post_type('destaques', $args);
};
add_action('init', 'mcz_custom_post_type_destaques', 0);

// Horário de Brasília como Padrão
function set_timezone_for_brasilia() {
  date_default_timezone_set('America/Sao_Paulo');
}
add_action('init', 'set_timezone_for_brasilia');

// Metabox Agenda
add_action('cmb2_admin_init', 'cmb2_fields_home');
function cmb2_fields_home() {
  $cmb = new_cmb2_box([
    'id' => 'home_box',
    'title' => 'Informações Adicionais',
    'object_types' => ['agenda'],
  ]);

  $cmb->add_field([
    'name' => 'Horário do Evento',
    'id' => 'horario',
    'type' => 'text_datetime_timestamp'
  ]); 

  $cmb->add_field([
    'name' => 'Link para compra',
    'id' => 'link-compra',
    'type' => 'text'
  ]); 
};

// Metabox Notícias
add_action('cmb2_admin_init', 'cmb2_fields_noticias');
function cmb2_fields_noticias() {
  $cmb = new_cmb2_box([
    'id' => 'noticias_box',
    'title' => 'Fonte',
    'object_types' => ['noticias'],
  ]);

  $cmb->add_field([
    'name' => 'Autor:',
    'id' => 'autor-noticias',
    'type' => 'text'
  ]);

  $cmb->add_field([
    'name' => 'Link:',
    'id' => 'link-noticias',
    'type' => 'text'
  ]); 
};

// Metabox Destaques
add_action('cmb2_admin_init', 'cmb2_fields_destaques');
function cmb2_fields_destaques() {
  $cmb = new_cmb2_box([
    'id' => 'destaques_box',
    'title' => 'Link do evento',
    'object_types' => ['destaques'],
  ]);

  $cmb->add_field([
    'name' => '',
    'id' => 'link-destaques',
    'type' => 'text'
  ]); 
};

// Metabox Fotos
add_action('cmb2_admin_init', 'cmb2_fields_fotos');
function cmb2_fields_fotos() {
  $cmb = new_cmb2_box([
    'id' => 'fotos_box',
    'title' => 'Link do evento',
    'object_types' => ['fotos'],
  ]);

  $cmb->add_field([
    'name' => '',
    'id' => 'link-fotos',
    'type' => 'text'
  ]); 
};



