<?php
/**
 * Template part for displaying the multifunctional Hero
 */

// Retrieving the hero Variables
$bg = get_field('backgroung');
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];

// Claim and subtitle
$firstLine = get_field('page_claim');
$firstLineColor = get_field('page_claim_color');
$subtitle = get_field('subtitle_check');
$secondLine = get_field('page_claim_subtitle');
$secondLineColor = get_field('page_claim_subtitle_color');

// Text Blocks
$columns = get_field('text_blocks');
$column1 = get_field('text_blocks_col_1');
$column2 = get_field('text_blocks_col_2');
$column3 = get_field('text_blocks_col_3');

// Call to action Control
$ctaController = get_field('call_to_action_buttons');

// Customers logos
$customersCheck = get_field('show_customers_logos');
$customersLabel = get_field('customers_label');


?>


<?php if ($bg == 'image'): ?>
	<div class="hero-image" style="background-image: url('<?php echo $thumb_url ?>')">

		<?php //overlay gradient feature
			$overlay = get_field('gradient_overlay');
			if ($overlay):
				$colorTop = get_field('gradient_color_top');
				$top = hex2rgb($colorTop);
				$colorBottom = get_field('gradient_color_bottom');
				$bottom = hex2rgb($colorBottom);
				?>
				<style media="screen">
					.gradient{
						background: -moz-linear-gradient(-45deg, rgba(<?php echo $top ?>,.9) 0%, rgba(<?php echo $bottom ?>,.6) 100%);
						background: -webkit-linear-gradient(-45deg, rgba(<?php echo $top ?>,.9) 0%,rgba(<?php echo $bottom ?>,.6) 100%);
						background: linear-gradient(135deg, rgba(<?php echo $top ?>,.9) 0%,rgba(<?php echo $bottom ?>,.6) 100%);
						filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $colorTop ?>', endColorstr='<?php echo $coloBottom ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
					}
				</style>
				<div class="gradient-overlay gradient"></div>
		<?php endif ?>

		<div class="l-container">

			<?php //Title & Subtitle ?>
		    <div class="l-col-8 page-claim">
		    	<h1 class="page-claim-title" style="color:<?php echo $firstLineColor ?>"><?php echo $firstLine ?></h1>
				<?php if($subtitle): ?>
					<h2 class="page-claim-subtitle" style="color:<?php echo $secondLineColor ?>"><?php echo $secondLine ?></h2>
				<?php endif; ?>
		    </div>

		    <?php //Columns Blocks ?>
		    <?php if ($columns != 'none'): ?>
			    <div class="l-col-12 columns-description">
			    	<?php if ($columns == '2'):?>
						<div class="l-col-5">
							<?php echo $column1; ?>
						</div>
						<div class="l-col-5">
							<?php echo $column2; ?>
						</div>
					<?php elseif($columns == '3'): ?>
						<div class="l-col-4">
							<?php echo $column1; ?>
						</div>
						<div class="l-col-4">
							<?php echo $column2; ?>
						</div>
						<div class="l-col-4">
							<?php echo $column3; ?>
						</div>
					<?php endif ?>
			    </div>
			<?php endif; ?>

	    <?php if ($ctaController): ?>
					<div class="l-col-8 cta-hero">
						<?php get_template_part( 'template-parts/content', 'cta' ); ?>
					</div>
			<?php endif;  ?>

			<?php if ($customersCheck): ?>
					<div class="customers-hero l-col-12 s-hidden">
						<div class="customers-label"><?php echo $customersLabel ?></div>

						<?php if( have_rows('customers_logos') ):
										$rows = get_field('customers_logos');
										$row_count = count($rows);
										$colWidth = 100/$row_count.'%';
										?>
										<div class="l-col-12">
										<?php while ( have_rows('customers_logos') ) : the_row(); ?>

													<div class="l-col-2">
														<img src="<?php echo the_sub_field('logo'); ?>" class="customer-logo" style="width: <?php //echo $colWidth; ?> ">
													</div>




										<?php endwhile; ?>
										</div>
							<?php endif; ?>

					</div>
			<?php endif; ?>


		</div>



	</div>
<?php elseif ($bg == 'map'): ?>
	<?php $map = get_field('map'); ?>
	<div class="hero-map">
			<?php echo do_shortcode($map); ?>
	</div>

<?php elseif ($bg == 'none'): ?>
	<div class="nohero"></div>
<?php endif; ?>
