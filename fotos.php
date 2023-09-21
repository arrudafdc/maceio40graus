<?php if(is_single()) : ?>
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h1 class="text-mcz-foto text-center">
          <?php the_title(); ?>
        </h1>
        <div class="bg-light mb-2 d-flex justify-content-center"><?php the_post_thumbnail('my-custom-thumb', ['class' => 'img-fluid  ']); ?></div>
        <a href="<?php echo get_post_meta(get_the_id(), 'link-fotos', true); ?>" target="_blank">
          <button class="btn btn-mcz-foto w-100 mb-4 text-white py-3 fw-bold">CLIQUE AQUI PARA VER TODAS AS FOTOS</button>   
        </a>
        <?php the_content(); ?>
      </div>

      <div class="col-lg-4">
        <h2>Publicidade</h2>
        <div class="bg-light mb-4 d-flex justify-content-center">
          <img class="img-fluid" src="http://localhost/maceio40graus/wp-content/uploads/2023/05/Captura-de-tela-2023-03-07-110405.png" alt="">
        </div>    
        <h2 class="h4 text-mcz-foto fw-bold">Mais Fotos</h2>
        <?php
            $post_atual = get_the_id();
            $args = [
              'post_type' => 'fotos',
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
    <a href="<?php echo get_post_meta(get_the_id(), 'link-fotos', true);?>" target="_blank">
      <?php the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top img-fluid thumb-main']); ?>
    </a>
    <div class="card-body">
      <h5 class="card-title"><?php the_title(); ?></h5>
    </div>
  </div>
</div>
<?php endif; ?>









