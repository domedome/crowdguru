<?php
/*
 Template Name: Centered
*/
?>

<?php get_header(); ?>

<div class="l-container">
    <main class="l-col-12 static-t" role="main">

        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'page' );
            comments_template();
        endwhile;
        ?>
    </main>
</div>

<?php get_footer(); ?>
