<?php
  $categories = get_the_category();
  $data_post = get_post_meta(get_the_id(), 'horario', true);
  $data_atual = time();
  $post_atual = get_the_id();
?>            


<?php if(is_single()) : ?>  
  <div class="container my-5">
    <div class="row gx-5">
      <div class="col-lg-8 mb-4">
        <h1 class="text-mcz-agenda text-center">
          <?php the_title(); ?>
        </h1>
        <div class="bg-light mb-2 d-flex justify-content-center"><?php the_post_thumbnail('my-custom-thumb', ['class' => 'img-fluid  ']); ?></div>
        
        <?php
          $link_compra = get_post_meta(get_the_id(), 'link-compra', true);

          if ($link_compra) { ?>
            <a href="<?php echo $link_compra; ?>" target="_blank">
              <button class="btn btn-mcz-agenda w-100 mb-4">Comprar</button>   
            </a>    
        <?php } ?>
      
        <p class="text-mcz-agenda">
          <?php
          
            if ( ! empty( $categories ) ) {
              echo esc_html( $categories[0]->name ) . ' - ';	
            }  
            echo date('d/m/y', $data_post) . ' às ' . date('H:i', $data_post);
          ?>
        </p>    
        <div class=""><?php the_content(); ?></div>
      </div>
      
      <div class="col-lg-4">
        <h2>Publicidade</h2>
        <div class="bg-light mb-4 d-flex justify-content-center">
          <img class="img-fluid" src="http://localhost/maceio40graus/wp-content/uploads/2023/05/Captura-de-tela-2023-03-07-110405.png" alt="">
        </div>    
        <h2 class="h4 text-mcz-agenda fw-bold">Mais Agenda</h2>
        <?php
            $args = [
              'post_type' => 'agenda',
              'posts_per_page' => 3
            ];
            $the_query = new WP_Query($args);
          ?>

          <?php if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php if ($post_atual != get_the_id()) { ?>
          
            <div class="card mb-4">
              <a href="<?php the_permalink(); ?>">
                <?php
                  the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top img-fluid thumb-main']);
                ?>
              </a>
              <div class="card-body">
                <p class="card-title fw-bold"><?php the_title(); ?></p>
              </div>
            </div>

          <?php } endwhile; ?>
          <?php else : ?>
            <p>Não tem post...</p>
          <?php endif; ?>
          <?php wp_reset_query(); ?> 
      </div>

    </div>
  </div>

<?php else : ?>
  <div class="col-sm-6">
    <div class="card">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top img-fluid thumb-main']); ?>
      </a>
      <div class="card-body">
        <h5 class="card-title fw-semibold"><?php the_title(); ?></h5>
        <span class="text-mcz-agenda m-0 fw-semibold">
          <?php
            if ( ! empty( $categories ) ) {
              echo esc_html( $categories[0]->name );	
            }
          ?>
        </span>
        <span class="text-mcz-agenda fw-semibold"> - <?php echo date('d/m', $data_post); ?></span>
      </div>
    </div>
  </div>
  <?php
    endif;
    
    if ($data_post && $data_atual >= $data_post) {
      wp_delete_post(get_the_id(), true);     
    };
  ?>


