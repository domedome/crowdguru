<?php get_header(); ?>

<div class="nohero"></div>

<div class="l-container">
    <main role="main" class="l-col-6 l-pad-2" id="posts">

        <!-- The content -->
        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'loop' );
        endwhile;
        ?>

        <!-- Pagination -->
        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>
    </main>

    <!-- Sidebar -->
    <aside role="complementary" class="widgets l-col-3 l-col-push-3 l-pad-2" >
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>
