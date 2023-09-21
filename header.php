<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-mcz-principal mb-lg-5">
  <div class="container">
      <a href="<?php echo home_url(); ?>" class="py-2">
        <?php
          $mcz_custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $mcz_custom_logo_id , 'full');
          if ( has_custom_logo() ) {
            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" width="80">';
          } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
          }
        ?>
      </a>

      <button class="navbar-toggler bg-warning p-3 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <p class="mb-0 text-white fs-6 fw-bold">MENU</p>
      </button>

    <?php
    wp_nav_menu( array(
        'theme_location'    => 'header',
        'depth'             => 2,
        'container'         => 'div',
        'container_class' => 'collapse navbar-collapse  py-2',
        'container_id'    => 'navbarSupportedContent',
        'menu_class'        => 'navbar-nav ms-auto',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    ) );
    ?>

      
  </div>
</nav>
</header>

