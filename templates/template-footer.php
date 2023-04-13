<?php /* Template Name: Footer */ ?>


<footer>
	<div class="container">
		<div class="grid-container">
			<div class="grid">
				<div class="item item1">
					<div class="tagline"><?php echo get_field('footer_tagline','option'); ?></div>
				</div>
				<div class="item item2">
					<div class="contact-container">
						<div class="contact first"><a href="tel:<?php echo get_field('footer_phone','option'); ?>"><i class="fas fa-phone"></i><?php echo get_field('footer_phone','option'); ?></a></div>
						<div class="contact"><i class="fas fa-map-marker"></i><?php echo get_field('footer_address','option'); ?></div>
					</div>
				</div>
				<div class="item item3">
					<div class="links-container">
						<div class="links"><a href="https://hvpwp.wonderboxsystem.com/PWP/Landing" target="_blank"><i class="fal fa-eye"></i>Provider Portal</a></div>
						<div class="links"><a href="<?php echo site_url(); ?>/provider-search/"><i class="far fa-search"></i>Find a Provider</a></div>
						<div class="links"><a href="https://hvmwp.wonderboxsystem.com/MWP/Landing" target="_blank"><i class="fas fa-user-lock"></i></i>Member Login</a></div>
					</div>
				</div>
				<div class="item item4">
					<div class="text"><?php echo get_field('footer_text','option'); ?></div>
					<div class="learn-more"><a href="<?php echo get_field('footer_learn_more_link','option'); ?>">LEARN MORE<i class="far fa-angle-right"></i></i></a></div>
				</div>
				<div class="item item5">
					<div class="affiliations">
						<?php
							if( have_rows('footer_affiliations','option') ):
								while( have_rows('footer_affiliations','option') ) : the_row();
									if (get_sub_field('link')) { echo '<a href="' . get_sub_field('link') . '" target="_blank">'; }
										echo '<image src="' . wp_get_attachment_url(get_sub_field('logo')) . '"/>';
									if (get_sub_field('link')) { echo '</a>'; }
								endwhile;
							endif;
						?>
					</div>
					<div class="linkedin">
						<a href="<?php echo get_field('footer_linkedin_link','option'); ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
					</div>			
				</div>
				<div class="item item6">
					<div class="legal-container">
						<?php
							if( have_rows('footer_legal_links','option') ):
								while( have_rows('footer_legal_links','option') ) : the_row();	
									$link = get_sub_field('legal_link');
									if ($link): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										echo '<div class="legal"><a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">'. esc_html( $link_title ) . '</a></div>';
									endif;
								endwhile;
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="#" id="scroll-to-top"><i class="fas fa-arrow-circle-up"></i></a>
	<div class="bottom-container">
		<div class="bottom">
			<div class="copyright">COPYRIGHT <?php echo date("Y"); ?> <a href="<?php echo site_url(); ?>">HERITAGE VISION PLANS</a></div>
			<div class="website">WEBSITE DESIGN BY <a href="https://buildcreate.com/">BUILD/CREATE</a></div>
		</div>
	</div>
</footer>