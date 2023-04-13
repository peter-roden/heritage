<?php
$block_name = "provider_updates_panel_top";
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
				<div class="row">
					<div class="left">
						<div class="image"><img src="<?php echo get_field('panel_top_image'); ?>"></div>
					</div>
					<div class="right">
						<div class="right-container">
							<div class="heading"><?php echo strtoupper(get_field('panel_top_heading')); ?></div>
							<div class="text"><?php echo get_field('panel_top_text'); ?></div>
							<?php	
								$link = get_field('panel_top_button');
								if ($link): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									echo '<button class="button-blue button-small">';
										echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . get_field('button_icon') . esc_html( $link_title ) . '</a>';
									echo '</button>';
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>