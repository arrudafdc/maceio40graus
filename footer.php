<footer class="bg-mcz-principal py-5">
  <div class="container text-white">
    <div class="row">
      <div class="col-lg-4 mb-4">
      <?php
        
        $mcz_custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $mcz_custom_logo_id , 'full');
        if ( has_custom_logo() ) {
          echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" width="100">';
        } else {
          echo '<h1>' . get_bloginfo('name') . '</h1>';
        }

        ?>
      </div>
      <div class="col-lg-4 mb-4">
        <h3>Contato</h3>
        <ul id="nav-contato" class="flex-column px-0" style="list-style: none;">
          <li>
            <a class="nav-link" href="#">+55 (82) 99947-9737</a>
          </li>
          <li>
            <a class="nav-link" href="#">contato@maceio40graus.com.br</a>
          </li>
          <li>
            <a class="nav-link" href="#">Instagram</a>
          </li>
          <li>
            <a class="nav-link" href="#">Facebook</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-4 mb-4">
        <h3>Menu</h3>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'footer',
            'depth'             => 2,
            'menu_class'        => 'nav flex-column',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
      </div>
      <p><em>Todos os direitos reservados.</em></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?> 
</body>
</html>