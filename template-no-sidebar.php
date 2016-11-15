<?php
/*
 Template Name: No Sidebar
*/
?>
<?php get_header(); ?>

<div class="l-container static-t">

    <main role="main" class="l-col-8">
        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'page' );
            comments_template();
        endwhile;
        ?>
    </main>

</div>

<?php get_footer(); ?>
