<?php
/*
 Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="l-container static-t">
    <main class="l-col-12" role="main">
        <div class="l-col-6">
            <h1 class="entry-title"><?php echo the_field('left_title') ?></h1>
            <?php echo the_field('right_content'); ?>
        </div>
        <div class="l-col-5 l-col-push-1 contact-form">
            <h2><?php echo the_field('right_title'); ?></h2>
            <?php echo do_shortcode(the_field('contact_form')); ?>
        </div>

    </main>
</div>

<?php get_footer(); ?>
