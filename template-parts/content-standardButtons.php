<?php
/**
 * Template part for displaying the Standard CTA buttons
 */

// Retrieving the hero Variables
$mainStandardButton = get_sub_field('btn_content');
$mainBtnType = get_sub_field('link');
$popupClass = '';

if ($mainBtnType == 'internal'){
		$ctalink = get_sub_field('internal_link');
} elseif ($mainBtnType == 'external'){
		$ctalink = get_sub_field('external_link');
} elseif ($mainBtnType == 'anchor'){
		$ctalink = '#'.get_sub_field('anchor');
} elseif ($mainBtnType == 'popup'){
		$ctalink = '#ctaPopup';
		$popupClass = 'popup-btn';
}
?>
<a href="<?php echo $ctalink ?>" class="mainCta <?php echo $popupClass ?>" > <?php echo $mainStandardButton; ?></a>

<?php // check if there is a secondary BadFunctionCallException
$secondaryStandard = get_sub_field('second_cta');

if($secondaryStandard):
	$secondaryStandardContent = get_sub_field('second_cta_content');
	$secondaryBtnType = get_sub_field('second_cta_type');

	if ($secondaryBtnType == 'internal'){
			$secondarylink = get_sub_field('second_link_internal');
	} elseif ($secondaryBtnType == 'external'){
			$secondaryBtnlink = get_sub_field('second_link_external');
	} elseif ($secondaryBtnType == 'anchor'){
			$secondaryBtnlink = '#'.get_sub_field('second_link_anchor');
	}?>

	<a href="<?php echo $secondaryBtnlink ?>" class="secondCta" > <?php echo $secondaryStandardContent; ?></a>

<?php endif; ?>





<?php //The popup content

	if ($mainBtnType == 'popup'): ?>

	<div id="ctaPopup" class="popupOverlay hide-popup">

			<div class="popupContent">
				<?php

				// Get the popup title
				$popupTitle = get_sub_field('popup_title');
				if ($popupTitle): ?>
					<h3 class="popup-title"><?php echo $popupTitle ?></h3>
				<?php
				endif;

				//Display the popup content
				$popupContent = get_sub_field('popup');
				if ($popupContent == 'form'):
						echo the_field('contact_form');
				elseif ($popupContent == 'text'): ?>
						<div class="popup-text-content">
							<?php echo the_field('popup_content') ?>
						</div>
						<?php
						$popupBtnLinkType = get_sub_field('popup_link');
						if ($popupBtnLinkType == 'internal'){
							$popupBtnLink = get_sub_field('popup_btn_internal_link');
						}elseif ($popupBtnLinkType == 'external'){
							$popupBtnLink = get_sub_field('popup_btn_external_link');
						}
						 ?>
						<a href="<?php echo $popupBtnLink ?>"><?php echo the_field('popup_btn_content') ?></a>
				<?php endif; ?>
			</div>

	</div>

<?php endif; ?>
