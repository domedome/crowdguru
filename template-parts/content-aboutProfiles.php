<?php
/**
 * Template part for the About page Profiles
 */
?>

	<div class="about-container">

	<?php if( have_rows('profiles') ):
			$i=0; ?>

			<div class="l-container">

 			<?php while ( have_rows('profiles') ) : the_row();
						$photo = get_sub_field('photo'); ?>

						<div class="l-col-3 single-profile">

								<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>" class="profile-pic"/>
								<div class="profile-name"><?php echo the_sub_field('name') ?></div>
								<div class="profile-position"><?php echo the_sub_field('position') ?></div>

						</div>

						<?php // close container in case of 4 columns
						$i++;
						if($i % 4 == 0): ?>
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
