<?php get_header(); ?>
  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php get_template_part('noticias', get_post_format()); ?>
  <?php endwhile; else : ?>
    <p>Nenhum post encontrado</p>
  <?php endif; ?>
<?php get_footer(); ?> 
