<?php
/**
 * Template part for displaying the multifunctional Hero
 */

// Retrieving the hero Variables
$mainCtaContent = get_field('btn_content');
$mainCtaType = get_field('link');
$popupClass = '';

if ($mainCtaType == 'internal'){
		$ctalink = get_field('internal_link');
} elseif ($mainCtaType == 'external'){
		$ctalink = get_field('external_link');
} elseif ($mainCtaType == 'anchor'){
		$ctalink = '#'.get_field('anchor');
} elseif ($mainCtaType == 'popup'){
		$ctalink = '#ctaPopup';
		$popupClass = 'popup-btn';
}
?>
<a href="<?php echo $ctalink ?>" class="mainCta <?php echo $popupClass ?>" > <?php echo$mainCtaContent; ?></a>

<?php // check if there is a secondary BadFunctionCallException
$secondaryCta = get_field('second_cta');

if($secondaryCta):
	$secondCtaContent = get_field('second_cta_content');
	$secondCtaType = get_field('second_cta_type');

	if ($secondCtaType == 'internal'){
			$secondCtalink = get_field('second_link_internal');
	} elseif ($secondCtaType == 'external'){
			$secondCtalink = get_field('second_link_external');
	} elseif ($secondCtaType == 'anchor'){
			$secondCtalink = '#'.get_field('second_link_anchor');
	}?>

	<a href="<?php echo $secondCtalink ?>" class="secondCta" > <?php echo $secondCtaContent; ?></a>

<?php endif; ?>





<?php //The popup content

	if ($mainCtaType == 'popup'): ?>

	<div id="ctaPopup" class="popupOverlay hide-popup">

			<div class="popupContent">
				<?php

				// Get the popup title
				$popupTitle = get_field('popup_title');
				if ($popupTitle): ?>
					<h3 class="popup-title"><?php echo $popupTitle ?></h3>
				<?php
				endif;

				//Display the popup content
				$popupContent = get_field('popup');
				if ($popupContent == 'form'):
						echo the_field('contact_form');
				elseif ($popupContent == 'text'): ?>
						<div class="popup-text-content">
							<?php echo the_field('popup_content') ?>
						</div>
						<?php
						$popupBtnLinkType = get_field('popup_link');
						if ($popupBtnLinkType == 'internal'){
							$popupBtnLink = get_field('popup_btn_internal_link');
						}elseif ($popupBtnLinkType == 'external'){
							$popupBtnLink = get_field('popup_btn_external_link');
						}
						 ?>
						<a href="<?php echo $popupBtnLink ?>"><?php echo the_field('popup_btn_content') ?></a>
				<?php endif; ?>
			</div>

	</div>

<?php endif; ?>
