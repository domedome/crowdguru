<?php
/*
 Template Name: Guru Werden
*/
?>

<?php get_header(); ?>

    <main class="l-col-12" role="main">
      <?php

        if( have_rows('blocks') ):
          while ( have_rows('blocks') ) : the_row();

              if( get_row_layout() == 'standard_cta' ):?>
                  <div class="l-container standard-cta">
                      <?php get_template_part( 'template-parts/content', 'standardCTA' ); ?>
                  </div>

        <?php elseif( get_row_layout() == 'testimonials' ):
                  get_template_part( 'template-parts/content', 'testimonialsBlock' );


              elseif( get_row_layout() == 'two_column' ):
                  get_template_part('template-parts/content', 'twoColumn');

             endif;
        endwhile;

        else :
                echo 'Nothing to show here';
        endif; ?>
    </main>
</div>

<?php get_footer(); ?>
