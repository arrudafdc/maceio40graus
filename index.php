<?php get_header(); ?> 

  <?php
    $destaques_args = [
    'post_type' => 'destaques',
    'posts_per_page' => 4
    ];
    $destaques_query = new WP_Query($destaques_args);
  ?>

  <section class="container-lg px-0 px-lg-2 mb-5">
    <h2 class="mb-1 h5 fw-bold text-mcz-destaque d-none d-lg-block">Destaques</h2>
    <div id="carouselDestaque" class="carousel slide">
      <div class="carousel-indicators d-none">
        <button type="button" data-bs-target="#carouselDestaque" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselDestaque" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselDestaque" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselDestaque" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
    <div class="carousel-inner">

  <?php

    if($destaques_query->have_posts()) :
    $contador = 0;
    while($destaques_query->have_posts()) : $destaques_query->the_post(); ?>
  
  <div class="carousel-item <?php $contador++; if($contador == 1) {echo ' active';} ?>">
    <a href="<?php echo get_post_meta(get_the_id(), 'link-destaques', true); ?>" target="_blank">
      <?php the_post_thumbnail('post-thumbnails', ['class' => "w-100 bg-min-h img-fluid"]); ?>
      <div class="carousel-caption p-0 p-sm-3">
        <h3 class="text-mcz-destaque text-shadow fw-bold"><?php the_title(); ?></h3>
      </div>
    </a>
  </div>

  <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?> 
  </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestaque" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next " type="button" data-bs-target="#carouselDestaque" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<div class="container mb-5">
  <div class="row gx-lg-5">
    <div class="col-md-8">
      <section class="row mb-3">
        <h2 class="h4 text-mcz-agenda fw-bold">Agenda</h2>
        
        <?php
          $agenda_args = [
            'post_type' => 'agenda',
            'posts_per_page' => 2
          ];
          $agenda_query = new WP_Query($agenda_args);
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
        
        <p class="h5 text-end m-0 fw-semibold"><a href="http://localhost/maceio40graus/agenda/" class="text-mcz-agenda text-decoration-none">Ver mais</a></p>
      </section>

      <section class="row mb-3">
        <h2 class="h4 text-mcz-noticia fw-bold">Notícias</h2>
        
          <?php
            $args = [
              'post_type' => 'noticias',
              'posts_per_page' => 2
            ];
            $the_query = new WP_Query($args);
          ?>

          <?php if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php get_template_part('noticias', get_post_format()); ?>
          <?php endwhile; ?>
          <?php else : ?>
            <p>Não tem post...</p>
          <?php endif; ?>
          <?php wp_reset_query(); ?> 
          

        <p class="h5 text-end m-0 fw-semibold"><a href="http://localhost/maceio40graus/noticias/" class="text-mcz-noticia text-decoration-none">Ver mais</a></p>
      </section>
      <section class="row mb-3">
        <h2 class="h4 text-mcz-foto fw-bold">Fotos</h2>

        <?php
          $fotos_args = [
            'post_type' => 'fotos',
            'posts_per_page' => 2
          ];
          $fotos_query = new WP_Query($fotos_args);
        ?>

        <?php if($fotos_query->have_posts()) : while($fotos_query->have_posts()) : $fotos_query->the_post(); ?>
          <?php get_template_part('fotos', get_post_format()); ?>
        <?php endwhile; ?>
        <?php else : ?>
          <p>Não tem post...</p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>     

        <p class="h5 text-end m-0 fw-semibold"><a href="http://localhost/maceio40graus/fotos/" class="text-mcz-foto text-decoration-none">Ver mais</a></p>
      </section>
      </div>
    
      <?php get_sidebar(); ?>

  </div>
</div>
<?php get_footer(); ?>