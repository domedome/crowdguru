<?php
/**
 * Template part for Two Column block
 */

 $blockBG = get_sub_field('background');
 $titleColor = get_sub_field('titles_color');
 $textColor = get_sub_field('text_color'); ?>
 <div class="two-col-wrapper"  style="background-color:<?php echo $blockBG; ?>">


 		<div class="l-container services-two-col">
 				<div class="l-col-5">
 						<h2 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('heading_left'); ?></h2>
 						<h3 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('Sub_Heading_left'); ?></h3>
 						<div class="col-content" style="color:<?php echo $textColor; ?>">
 						<?php
 								$contentLeft = get_sub_field('content_left');
 								if( $contentLeft == 'text'):
 										echo the_sub_field('text_left');
 								elseif ($contentLeft == 'image'):
 										$imageLeft = get_sub_field('image_left')?>
 										<img src="<?php echo $imageLeft['url'] ?>" alt="<?php echo $imageLeft['alt'] ?>" />
 						<?php endif; ?>
 						</div>
 				</div>
 				<div class="l-col-5 l-col-push-2">
 						<h2 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('heading_right'); ?></h2>
 						<h3 style="color:<?php echo $titleColor; ?>"><?php echo the_sub_field('Sub_Heading_right'); ?></h3>
 						<div class="col-content" style="color:<?php echo $textColor; ?>">
 						<?php
 								$contentRight = get_sub_field('content_right');
 								if( $contentRight == 'text'):
 									 echo the_sub_field('text_right');
 								elseif ($contentRight == 'image'):
 										$imageRight = get_sub_field('image_right'); ?>
 										<img src="<?php echo $imageRight['url']; ?>" alt="<?php echo $imageRight['alt']; ?>" />
 								<?php endif; ?>
 						</div>
 				</div>
 		</div>
 </div>
