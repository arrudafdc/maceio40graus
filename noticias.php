<?php if(is_single()) : ?>
<?php $post_atual = get_the_id(); ?>
  <div class="container my-5">
    <div class="row gx-5">
      <div class="col-lg-8 mb-4">
        <h1 class="h2 text-mcz-noticia">
          <?php the_title(); ?>
        </h1>
        <p class="text-secondary"><?php echo  get_the_excerpt(); ?></p>
        <div class="bg-light d-flex justify-content-center"><?php the_post_thumbnail('my-custom-thumb', ['class' => 'img-fluid ']); ?></div>
        <span class="text-secondary fw-light"><?php the_post_thumbnail_caption( ) ?></span>
        <div class="noticia-conteudo mt-4 "><?php the_content(); ?></div>
        <a href="<?php echo get_post_meta(get_the_id(), 'link-noticias', true); ?>" target="_blank">
          <p><?php echo get_post_meta(get_the_id(), 'autor-noticias', true); ?></p>
        </a>
      </div>
      
      <div class="col-lg-4">
        <h2>Publicidade</h2>
        <div class="bg-light mb-4 d-flex justify-content-center">
          <img class="img-fluid" src="http://localhost/maceio40graus/wp-content/uploads/2023/05/Captura-de-tela-2023-03-07-110405.png" alt="">
        </div>    
        <h2 class="h4 text-mcz-noticia fw-bold">Mais Notícias</h2>
        <?php
            $args = [
              'post_type' => 'noticias',
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
                <p class="card-title"><?php the_title(); ?></p>
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
        <?php
          the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top img-fluid thumb-main']);
        ?>
      </a>
      <div class="card-body">
        <p class="card-title"><?php the_title(); ?></p>
      </div>
    </div>
  </div>
<?php endif; ?>

