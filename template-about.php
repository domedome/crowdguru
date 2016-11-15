<?php
/*
 Template Name: About
*/
?>

<?php get_header(); ?>

    <main role="main">
        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'aboutProfiles' );
            comments_template();
        endwhile;
        ?>
    </main>


<?php get_footer(); ?>
