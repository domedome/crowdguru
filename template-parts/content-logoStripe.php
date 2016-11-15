<?php
/**
 * Template partial the logo stripe
 */
$stripeLabel = get_sub_field('stripe_label');
?>
<div class="l-container">

	<?php if( have_rows('stripe_logos') ):
			if($stripeLabel):?>

			<div class="l-col-2 stripe-label">
					<?php echo $stripeLabel; ?>
			</div>
		<?php endif ?>

			<?php while ( have_rows('stripe_logos') ) : the_row();
					$logo =get_sub_field('logo');
			 ?>
				<div class="l-col-2">
						<a href="<?php echo get_sub_field('link'); ?>">
								<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class=" stripe-logo"/>
						</a>
				</div>
			<?php endwhile; ?>




<?php endif; ?>
</div>
