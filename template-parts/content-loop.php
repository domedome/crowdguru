<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('main-loop'); ?>>

	<!-- The thumbnail -->
	<a href="<?php echo get_permalink($post->ID); ?>"><?php the_post_thumbnail('full'); ?></a>

	<!-- Post header -->
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h2>
        <aside class="entry-meta">
            <?php _e('Posted', 'monsieurpress'); ?> <?php the_date(); ?> <?php _e('by', 'monsieurpress'); ?> <?php the_author(); ?>
        </aside>
	</header>

	<!-- Post excerpt -->
	<div class="entry-content">
		<a href="<?php echo get_permalink($post->ID); ?>"><?php the_excerpt(); ?></a>
	</div>

</article>
