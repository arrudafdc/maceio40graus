<?php get_header(); ?> 
<div class="container mb-5">
  <div class="row">
    <div class="col-md-8">
      <section class="row mb-4">
        <h1 class="h2 mb-4">Resultado de busca para: '<?php echo get_search_query(); ?>'</h2>
        
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
          <div class="mb-2">
            <a href="<?php echo get_post_meta(get_the_id(), 'link-fotos', true); ?>" target="_blank">
              <h2 class="h4"><?php the_title(); ?></h2>
            </a>
          </div>
        <?php endwhile; ?>
          
        <?php else : ?>
          <p>Não tem post...</p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <?php
          global $wp_query;
          $big = 999999999;
        ?>
          <div class="paginacao">
            <?php
            echo paginate_links(
              array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $wp_query->max_num_pages,
                  'prev_text'          => __('<'),
                  'next_text'          => __('>'),
            )
            );
            ?>
          </div>
        

      </section>
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
<?php get_footer(); ?>
