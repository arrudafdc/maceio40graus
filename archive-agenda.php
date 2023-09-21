<?php get_header(); ?> 
<section class="archive-margin container mb-5 mt-5">
  <div class="row gx-5">
    <div class="col-lg-8">
      <section class="row mb-4">
        <h1 class="h2 text-mcz-agenda fw-bold">Agenda</h2>

        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $agenda_args = array(
            'post_type' => 'agenda',
            'posts_per_page' => 6,
            'order' => 'ASC',
            'orderby' => 'meta_value',
            'meta_key' => 'horario',
            'paged' => $paged
        );

        $agenda_query = new WP_Query( $agenda_args ); 
        ?>

        <?php if($agenda_query->have_posts()) : while($agenda_query->have_posts()) : $agenda_query->the_post(); ?>
          <?php
            get_template_part('agenda', get_post_format());
          ?>
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
                  'total' => $agenda_query->max_num_pages,
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
          $fotos_args = [
            'post_type' => 'fotos',
            'posts_per_page' => 1
          ];
          $fotos_query = new WP_Query($fotos_args);
        ?>

        <?php if($fotos_query->have_posts()) : while($fotos_query->have_posts()) : $fotos_query->the_post(); ?>
          <h2 class="h4 text-mcz-foto fw-bold">Fotos</h2>
          <div class="card">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top img-fluid thumb-main']); ?>
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

        <?php
            $args = [
              'post_type' => 'noticias',
              'posts_per_page' => 1
            ];
            $the_query = new WP_Query($args);
          ?>

          <?php if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
          <h2 class="h4 text-mcz-noticia fw-bold">Notícias</h2>
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
          <?php endwhile; ?>
          <?php else : ?>
            <p>Não tem post...</p>
          <?php endif; ?>
          <?php wp_reset_query(); ?> 
      </div>

  </div>
</section>
<?php get_footer(); ?>