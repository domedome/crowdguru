<?php
/**
 * Template part for the About page Profiles
 */
?>

	<?php if( have_rows('projects') ):
			$i=0; ?>

			<div class="l-container">

 			<?php while ( have_rows('projects') ) : the_row();
						$photo = get_sub_field('thumb');
						$file =	get_sub_field('attachment');
						?>
						<div class="l-col-4 single-case">

								<img src="<?php echo $photo['sizes']['large'] ?>" alt="<?php echo $photo['alt'] ?>" class="case-studies-pic"/>
								<div class="case-study-title"><?php echo the_sub_field('title') ?></div>
								<div class="case-study-description"><?php echo the_sub_field('description') ?></div>

								<div class="case-study-download btn">
										<a href="<?php echo $file['url'] ?>" title="<?php echo $file['title'] ?>">
												<?php echo the_field('download_label') ?>
										</a>
								</div>

						</div>

						<?php // close container in case of 4 columns
						$i++;
						if($i % 3 == 0): ?>
								</div>
								<div class="l-container">
						<?php endif; ?>

			<?php endwhile; ?>

		</div>

<?php endif; ?>
