<?php
/*
 Template Name: Custom Blocks
*/
?>

<?php get_header(); ?>

    <main class="l-col-12" role="main">
      <?php

        // flexible content
        if( have_rows('template_blocks') ):

           // loop through the rows of data
          while ( have_rows('template_blocks') ) : the_row();

              //Check Service Features Icons
              if( get_row_layout() == 'services_icons' ):
                $anchorID = '';
                $anchorIDname = get_sub_field('anchor_id_name');
                if ($anchorIDname){
                  $anchorID = 'id="'.$anchorIDname.'"';
                }
                ?>
                <div class="l-container">
                  <div <?php echo $anchorID; ?> class="l-col-12">
                  <?php if( have_rows('single_service') ):

                      while ( have_rows('single_service') ) : the_row(); ?>

                        <div class="l-col-3 service-wrapper">
                          <div class="feature-icon" style="background-image: url('<?php echo get_sub_field('icon'); ?>');"></div>
                          <div class="feature-title">
                            <?php echo get_sub_field('title') ?>
                          </div>
                          <div>
                            <?php echo get_sub_field('description') ?>
                          </div>
                        </div>

            				  <?php endwhile;?>
                    </div>
                  </div>
          			<?php endif;



            elseif( get_row_layout() == 'testimonials_slider' ):

                if (get_sub_field('background')){
                  $testimonialsBg = get_sub_field('background');
                }

                // Gradient Overlay for the slider
                $colorTop = get_sub_field('gradient_top');
                $top = hex2rgb($colorTop);
                $colorBottom = get_sub_field('gradient_bottom');
                $bottom = hex2rgb($colorBottom);
                ?>
                <style>
                  .gradientTestimonials{
                    background: -moz-linear-gradient(-45deg, rgba(<?php echo $top ?>,.9) 0%, rgba(<?php echo $bottom ?>,.6) 100%);
                    background: -webkit-linear-gradient(-45deg, rgba(<?php echo $top ?>,.9) 0%,rgba(<?php echo $bottom ?>,.6) 100%);
                    background: linear-gradient(135deg, rgba(<?php echo $top ?>,.9) 0%,rgba(<?php echo $bottom ?>,.6) 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $colorTop ?>', endColorstr='<?php echo $coloBottom ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
                  }
                </style>

                <?php
                if( have_rows('single_testimonial') ): ?>

                    <div class="testimonialsBg" style="background-image:url('<?php echo $testimonialsBg ?>');">
                      <div class="gradient-overlay gradientTestimonials"></div>
                      <a href="#" class="control_next"><img src="<?php echo get_template_directory_uri(); ?>/images/next.svg"/></a>
                      <a href="#" class="control_prev"><img src="<?php echo get_template_directory_uri(); ?>/images/prev.svg"/></a>
                      <div id="slider">
                        <ul>



                          <?php // loop through the rows of data
              			      while ( have_rows('single_testimonial') ) : the_row();
                              $testimonialLogo = get_sub_field('logo'); ?>
                              <li>
                                  <img src="<?php echo $testimonialLogo['url']; ?>" alt="<?php echo $testimonialLogo['alt']; ?>" class="l-col-4"/>
                                  <div class="l-col-8 l-col-push-2 testimonial-sentence">
                                      <?php echo get_sub_field('sentence'); ?>
                                  </div>
                                  <div class="l-col-6 l-col-push-6 testimonial-name">
                                      <?php echo get_sub_field('name'); ?>
                                  </div>
                                  <div class="l-col-6 l-col-push-6 testimonial-position">
                                      <?php echo get_sub_field('position'); ?>
                                  </div>
                              </li>
              					  <?php endwhile; ?>


                        </ul>
                      </div>
                    </div>

          		<?php endif;
              elseif( get_row_layout() == 'standard_cta' ):?>
                  <div class="l-container standard-cta">
                      <?php get_template_part( 'template-parts/content', 'standardCTA' ); ?>
                  </div>


              <?php elseif( get_row_layout() == 'logos' ):?>
                  <div class="logos-stripe s-hidden" style="background-color:<?php echo get_sub_field('stripe_bg') ?>">
                      <?php get_template_part( 'template-parts/content', 'logoStripe' ); ?>
                  </div>
              <?php endif;
            endwhile;
        else :
                echo 'Nothing to show here';
        endif;

        ?>

        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'single' );
            comments_template();
        endwhile;
        ?>
    </main>
</div>

<?php get_footer(); ?>
