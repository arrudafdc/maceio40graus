<div class="col-md-4">
        <h2 class="h4 fw-bold">Eventos</h2>
        <div id="carouselPublicidade" class="carousel slide">
          <div class="carousel-inner">
          <?php
            $publi_args = [
            'post_type' => 'carrossel-publi',
            'posts_per_page' => 5
            ];
            $publi_query = new WP_Query($publi_args);
          ?>

          <?php if($publi_query->have_posts()) :
           $contador = 0;
            while($publi_query->have_posts()) : $publi_query->the_post(); ?>
          
          <div class="carousel-item <?php $contador++; if($contador == 1) {echo ' active';} ?>">
            <?php the_post_thumbnail('post-thumbnails', ['class' => "d-block w-100 img-fluid publi-thumb"]); ?>
          </div>st-thumbnai

          <?php endwhile; ?>
          <?php else : ?>
            <p>Não tem post...</p>
          <?php endif; ?>
          <?php wp_reset_query(); ?> 

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPublicidade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPublicidade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>