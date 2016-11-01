            </div>
                <footer class="footer l-col-12">

                  <?php //Social media incons/links ?>
                  <div class="l-container">
                      <div class="l-col-4 l-col-push-4 footer-social-icons">
                        <?php

                          // check if the repeater field has rows of data
                          if( have_rows('social_media_icons','option') ):

                          // loop through the rows of data
                            while ( have_rows('social_media_icons','option') ) : the_row();
                                $icon = get_sub_field('icon','option'); ?>
                                <a href="<?php echo the_sub_field('link','option') ?>">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="s-icon" />
                                </a>
                            <?php endwhile;

                          else :

                            // no rows found

                          endif;

                          ?>
                      </div>
                  </div>

                  <div class="footer-border"></div>

                  <div class="l-container">

                      <?php //Site Logo ?>
                      <div class="l-col-3 footer-logo">
                        <a class="site-logo" href="<?php echo home_url(); ?>" rel="nofollow">
                          <?php $footerLogo = get_field('footer_logo','option');
                                if($footerLogo): ?>
                                    <img src="<?php echo $footerLogo['url']; ?>" alt="Logo" />
                          <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo"/>
                          <?php endif;?>
                        </a>
                      </div>

                      <?php //Footer Navigation - Setup in WP menu ?>
                      <div class="l-col-3 footer-nav">

                        <h3><?php pll_e('Footer: Company'); ?></h3>
                        <?php wp_nav_menu( array(
                            'theme_location' => 'footer-links',
                            'menu_class' => 'footer-links',
                            'container' => false
                        ) ); ?>
                      </div>


                      <div class="l-col-3 footer-contact-info">
                        <h3><?php pll_e('Footer: Contact'); ?></h3>
                        <div class="footer-contact-content">
                            <?php echo the_field('contact_contents','option'); ?>
                        </div>
                      </div>


                      <div class="l-col-3 footer-contact-form">
                        <h3><?php pll_e('Footer: Contact Form'); ?></h3>
                        <?php echo the_field('footer_contact_form','option') ?>
                      </div>
                  </div>
                  <div class="footer-border"></div>
                  <div class="l-container">
                      <div class="l-col-12 footer-copyright">
                          <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
                      </div>
                  </div>

                </footer>

		</div>
		<?php wp_footer(); ?>

	</body>
</html>
