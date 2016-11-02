<?php get_header();?>

<div class="l-container">

    <main role="main" class="l-col-12">

        <?php
        while (have_posts()) : the_post();
        $serviceIcon = get_field('service_icon');
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
              // Basic settngs variables
              $blockBG = get_sub_field('background');
              $titleColor = get_sub_field('titles_color');
              $textColor = get_sub_field('text_color'); ?>
              <div class="two-col-wrapper"  style="background-color:<?php echo $blockBG; ?>">


                  <div class="l-container services-two-col">
                      <div class="l-col-5">
                          <h2 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('heading_left'); ?></h2>
                          <h3 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('Sub_Heading_left'); ?></h3>
                          <div class="col-content" style="color:<?php echo $textColor; ?>">
                          <?php
                              $contentLeft = get_sub_field('content_left');
                              if( $contentLeft == 'text'):
                                  echo the_sub_field('text_left');
                              elseif ($contentLeft == 'image'):
                                  $imageLeft = get_sub_field('image_left')?>
                                  <img src="<?php echo $imageLeft['url'] ?>" alt="<?php echo $imageLeft['alt'] ?>" />
                          <?php endif; ?>
                          </div>
                      </div>
                      <div class="l-col-5 l-col-push-1">
                          <h2 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('heading_right'); ?></h2>
                          <h3 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('Sub_Heading_right'); ?></h3>
                          <div class="col-content" style="color:<?php echo $textColor; ?>">
                          <?php
                              $contentRight = get_sub_field('content_right');
                              if( $contentRight == 'text'):
                                 echo the_sub_field('text_right');
                              elseif ($contentRight == 'image'):
                                  $imageRight = get_sub_field('image_right'); ?>
                                  <img src="<?php echo $imageRight['url']; ?>" alt="<?php echo $imageRight['alt']; ?>" />
                              <?php endif; ?>
                          </div>
                      </div>
                  </div>
              </div>

          <?php endif;
        endwhile;
    else :
            echo 'Nothing to show here';
    endif; ?>



<?php get_footer(); ?>
