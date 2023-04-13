<?php
	$block_name = "page-not-found";
	$id = $block_name . $block['id'];
	if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
	}
	$className = $block_name;
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
?>
	<style>
		#<?php echo esc_attr($id); ?>  {
			background:url("<?php echo wp_get_attachment_url(get_field('background_image')); ?>") center center no-repeat;
			background-size:cover
		}
		@media screen and (max-width: 800px) {
			#<?php echo esc_attr($id); ?>  { 
				background:url("<?php echo wp_get_attachment_url(get_field('background_image_mobile')); ?>") center center no-repeat;
				background-size:cover
			}
		}
	</style>
	
	<section id="<?php echo esc_attr($id); ?>" class="image <?php echo esc_attr($className); ?> ">
		<div class="wrapper narrow ">
			<div class="content">
				<div class="heading-container">
					<div class="heading"><?php echo get_field('heading'); ?></div>
					<?php if (get_field('sub_heading')) : ?>
						<div class="sub-heading"><?php echo get_field('sub_heading'); ?></div>
					<?php endif; ?>
				</div>
				<?php 
					$button = get_field('button');
					if( $button ): 
						$button_url 	= $button['url'];
						$button_title 	= $button['title'];
						$button_target 	= $button['target'] ? $button['target'] : '_self';
					endif;
				?>
					<div class="contact-container">
						<div class="button-container">
							<a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><i class="fas fa-button"></i><?php echo esc_html( $button_title ); ?></a>
						</div>
						<div class="or">OR</div>
						<div class="phone">Call <a href="tel:<?php echo get_field('phone'); ?>"><?php echo get_field('phone'); ?></a></div>
					</div>
		</div>
	</section>