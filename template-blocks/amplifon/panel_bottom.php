<?php
$block_name = "amplifon_panel_bottom";
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

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="wrapper">
		<div class="content">
			<div class="content-container">
				<div class="desktop">
					<div class="row">
						<div class="left">
							<div class="left-container">
								<div class="image"><img src="<?php echo get_field('panel_bottom_image'); ?>"></div>
							</div>
						</div>
						<div class="right">
							<div class="right-container">
								<div class="right-text"><?php echo get_field('panel_bottom_text'); ?></div>							
								<?php	
									$link = get_field('panel_bottom_button');
									if ($link): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										echo '<button class="button-red button-small">';
											echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . '<i class="fa-solid fa-check"></i>' . esc_html( $link_title ) . '</a>';
										echo '</button>';
									endif;
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="mobile">
					<div class="mobile-container">
						<div class="image"><img src="<?php echo get_field('panel_bottom_image'); ?>"></div>
						<div class="left">
							<div class="left-container">
								<div class="left-text"><?php echo get_field('panel_bottom_text'); ?></div>
								<div class="line"></div>
								<?php	
									$link = get_field('panel_bottom_button');
									if ($link): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										echo '<button class="button-red button-small">';
											echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . '<i class="fa-solid fa-check"></i>' . esc_html( $link_title ) . '</a>';
										echo '</button>';
									endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>