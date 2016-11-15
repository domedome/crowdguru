<?php
/**
 * Template part for Testimonials Block
 */
?>

	<div class="testimonials-container">
		<div class="l-container">
				<div class="testimonials-title l-col-10 l-col-push-1">
						<h2><?php echo the_sub_field('block_title');	 ?></h2>
				</div>
	<?php if( have_rows('testimonial') ):
			$i=0; ?>

 			<?php while ( have_rows('testimonial') ) : the_row();
						$photo = get_sub_field('profile'); ?>

						<div class="l-col-4 single-testimonial">

								<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>" class="testimonial-pic"/>
								<div class="testimonial-name"><?php echo the_sub_field('name') ?></div>
								<div class="testimonial-quote"><?php echo the_sub_field('quotation') ?></div>

						</div>

						<?php // close container in case of 4 columns
						$i++;
						if($i % 3 == 0): ?>
								</div>
								<div class="l-container">
						<?php endif; ?>

			<?php endwhile; ?>

			<?php //Add a last profile as link to the career page
			$lastProfile = get_field('last_profile');
			if($lastProfile):
					$photo = get_field('lp_photo');?>

					<div class="l-col-3 single-profile last-profile">
							<a href="<?php echo the_field('lp_link'); ?>">
									<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>" class="profile-pic"/>
									<div class="profile-name"><?php echo the_field('lp_name') ?></div>
									<div class="profile-position"><?php echo the_field('lp_position') ?></div>
							</a>
					</div>

		<?php endif ?>

		</div>

<?php endif; ?>
</div>
