<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- The thumbnail -->
	<a href="<?php echo get_permalink($post->ID); ?>"><?php the_post_thumbnail('medium'); ?></a>

	<!-- Post header -->
	<header class="entry-header">
		<a href="<?php echo get_permalink($post->ID); ?>">	<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?> </a>
	</header>

	<!-- Post excerpt -->
	<div class="entry-content">
		<?php echo excerpt(35); ?>
		<div class="entry-read-more">
			<?php echo excerpt_more(); ?>
		</div>
	</div>


</article>
