<?php
/**
 * Template part for standard CTA block
 */
$firstLine = get_sub_field('standard_cta_first_line');
$firstLineColor = get_sub_field('standard_cta_first_line_color');
$secondLine = get_sub_field('standard_cta_second_line');
$secondLineColor = get_sub_field('standard_cta_second_line_color');
?>
<div class="l-col-6 l-col-push-3 standard-cta-title">
		<h2 style="color:<?php echo $firstLineColor ?>"><?php echo $firstLine ?></h2>
		<h3 style="color:<?php echo $secondLineColor ?>"><?php echo $secondLine ?></h3>
</div>
<div class="l-col-6 l-col-push-3 standard-cta-description">
		<?php echo get_sub_field('standard_cta_description'); ?>
</div>
<div class="l-col-6 l-col-push-3 standard-cta-buttons">
		<?php get_template_part( 'template-parts/content', 'standardButtons' ); ?>
</div>
