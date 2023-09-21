<?php get_header(); ?> 
<section class="archive-margin container mb-5 mt-5">
  <div class="row gx-5">
    <div class="col-lg-8">
      <section class="row mb-4">
        <h1 class="h2 text-mcz-noticia fw-bold">Notícias</h2>
        
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $noticias_args = [
            'post_type' => 'noticias',
            'posts_per_page' => 6,
            'paged'          => $paged
          ];
          $noticias_query = new WP_Query($noticias_args);
        ?>

        <?php if($noticias_query->have_posts()) : while($noticias_query->have_posts()) : $noticias_query->the_post(); ?>
          <?php get_template_part('noticias', get_post_format()); ?>
        <?php endwhile; ?>
        <?php else : ?>
          <p>Não tem post...</p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>     
        
        <?php
           $big = 999999999;
        ?>
          <div class="paginacao">
            <?php
            echo paginate_links(
              array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $noticias_query->max_num_pages,
                  'prev_text'          => __('<'),
                  'next_text'          => __('>'),
            )
            );
            ?>
          </div>
        

      </section>
      </div>
    
      <div class="d-none d-lg-block col-4">
        <h2>Publicidade</h2>
        <div class="bg-light mb-4 d-flex justify-content-center">
          <img class="img-fluid" src="http://localhost/maceio40graus/wp-content/uploads/2023/05/Captura-de-tela-2023-03-07-110405.png" alt="">
        </div>    
        <?php
          $agenda_args = [
            'post_type' => 'agenda',
            'posts_per_page' => 1
          ];
          $agenda_query = new WP_Query($agenda_args);
        ?>

        <?php if($agenda_query->have_posts()) : while($agenda_query->have_posts()) : $agenda_query->the_post(); ?>
          <h2 class="h4 text-mcz-agenda fw-bold">Agenda</h2>
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
            </div>
          </div>
        <?php endwhile; ?>
        
        <?php else : ?>
          <p>Não tem post...</p>
        <?php endif; ?>
        <?php wp_reset_query(); ?> 

        <?php
            $args = [
              'post_type' => 'fotos',
              'posts_per_page' => 1
            ];
            $the_query = new WP_Query($args);
          ?>

          <?php if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
          <h2 class="h4 text-mcz-foto fw-bold">Fotos</h2>
            <div class="card">
              <a href="<?php the_permalink(); ?>">
                <?php
                  the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top img-fluid thumb-main']);
                ?>
              </a>
              <div class="card-body">
                <h5 class="card-title fw-semibold"><?php the_title(); ?></h5>
              </div>
            </div>
          <?php endwhile; ?>
          <?php else : ?>
            <p>Não tem post...</p>
          <?php endif; ?>
          <?php wp_reset_query(); ?> 
      </div>

  </div>
</section>
<?php get_footer(); ?>