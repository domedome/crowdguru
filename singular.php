<?php get_header(); ?>

<div class="hero-blog">
  <?php //overlay gradient feature
      $colorTop = get_field('gradient_top');
      $top = hex2rgb($colorTop);
      $colorBottom = get_field('gradient_bottom');
      $bottom = hex2rgb($colorBottom);
      ?>
      <style media="screen">
          .hero-blog{
              background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium', false )[0] ?>');
          }
          @media (min-width: 767px) {
              .hero-blog{
                  background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', false )[0] ?>');
              }
          }
          @media (min-width: 1023px) {
              .hero-blog{
                  background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>');
              }
          }
          .gradient{
          background: -moz-linear-gradient(-45deg, rgba(<?php echo $top ?>,.9) 0%, rgba(<?php echo $bottom ?>,.6) 100%);
          background: -webkit-linear-gradient(-45deg, rgba(<?php echo $top ?>,.9) 0%,rgba(<?php echo $bottom ?>,.6) 100%);
          background: linear-gradient(135deg, rgba(<?php echo $top ?>,.9) 0%,rgba(<?php echo $bottom ?>,.6) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $colorTop ?>', endColorstr='<?php echo $coloBottom ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        }
      </style>

      <div class="gradient-overlay gradient"></div>

      <div class="l-container post-head">

          <div class="post-title l-col-8">
              <h1> <?php single_post_title(); ?> </h1>
          </div>

          <div class="post-excerpt l-col-8">
              <?php echo apply_filters('get_the_excerpt', $post->post_excerpt); ?>
          </div>

      </div>
</div>

<div class="l-container">

    <main role="main" class="l-col-7 post-content">
        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'single' );
            comments_template();
        endwhile;
        ?>
    </main>

    <aside role="complementary" class="widgets l-col-3 l-col-push-2 l-pad-2" >
        <?php get_sidebar(); ?>
    </aside>

</div>

<?php get_footer(); ?>
