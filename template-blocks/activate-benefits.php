<?php
	$block_name = "activate-benefits";
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
		background-color: <?php echo get_field('background_color'); ?>
	}
</style>

<section id="<?php echo esc_attr($id); ?>" class="hearing-loss-background <?php echo esc_attr($className); ?>">
	<div class="wrapper">
		<div class="content-wrapper">
				<div class="content">
					<div class="left">
						<div class="intro-text"><?php echo get_field('intro_text'); ?></div>
						<div class="heading"><?php echo get_field('heading'); ?></div>
					</div>
					<div class="right">
						<div class="or">Or</div>
						<?php	
							$link = get_field('button');
							if ($link): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								echo '<button class="button-white button-large">';
									echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
								echo '</button>';
							endif;
						?>
					</div>
			</div>
		</div>
	</div>
</section>