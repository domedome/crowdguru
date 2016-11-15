<?php
/*
 Template Name: Case Studies
*/
?>

<?php get_header(); ?>

<div class="case-studies static-t">

    <?php get_template_part( 'template-parts/content', 'caseStudies' ); ?>

    <div class="l-conttainer">
        <main class="l-col-10 l-col-push-1" role="main">
            <?php
            while (have_posts()) : the_post();
                if (the_content()):
                    get_template_part( 'template-parts/content', 'page' );
                    comments_template();
                endif;
            endwhile;
            ?>
        </main>
    </div>
</div>

<div class="logos-stripe s-hidden" style="background-color:<?php echo get_field('stripe_bg') ?>">
    <?php get_template_part( 'template-parts/content', 'logoStripe' ); ?>
</div>

<?php get_footer(); ?>
