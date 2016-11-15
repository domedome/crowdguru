<?php get_header();?>

<div class="l-container">

    <main role="main" class="l-col-12">

        <?php
        while (have_posts()) : the_post();
            if (the_content()):
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <!-- Post content -->
          <div class="entry-content l-col-8">
            <?php the_content(); ?>
            <p class="tags">
                <?php the_tags(); ?>
            </p>
            <div class="pagination">
                <?php wp_link_pages(); ?>
            </div>
          </div>

        <?php endif; ?>
        <?php endwhile; ?>
      </main>


    </div>
    <?php // flexible content
    if( have_rows('services') ):

       // loop through the rows of data
      while ( have_rows('services') ) : the_row();

          //Check Standard CTA

          if( get_row_layout() == 'standard_cta' ):?>
              <div class="l-container standard-cta">
                  <?php get_template_part( 'template-parts/content', 'standardCTA' ); ?>
              </div>


          <?php elseif( get_row_layout() == 'logos' ):?>
              <div class="logos-stripe s-hidden" style="background-color:<?php echo get_sub_field('stripe_bg') ?>">
                  <?php get_template_part( 'template-parts/content', 'logoStripe' ); ?>
              </div>


          <?php elseif( get_row_layout() == 'two_column' ):

              get_template_part('template-parts/content', 'twoColumn');

          endif;
        endwhile;
    else :
            echo 'Nothing to show here';
    endif; ?>



<?php get_footer(); ?>
