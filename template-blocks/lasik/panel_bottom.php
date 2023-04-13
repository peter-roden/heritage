<?php
$block_name = "lasik_panel_bottom";
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
								<div class="image-text">
									<div class="left-heading"><?php echo get_field('panel_bottom_image_heading'); ?></div>
									<div class="left-text"><?php echo get_field('panel_bottom_image_text'); ?></div>
								</div>
							</div>
						</div>
						<div class="right">
							<div class="right-container">
								<div class="right-heading"><?php echo get_field('panel_bottom_heading'); ?></div>
								<div class="right-subheading"><?php echo get_field('panel_bottom_sub_heading'); ?></div>
								<div class="right-text"><?php echo get_field('panel_bottom_text'); ?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="mobile">
					<div class="mobile-container">
						<div class="image"><img src="<?php echo get_field('panel_bottom_image'); ?>"></div>
						<div class="right-heading"><?php echo get_field('panel_bottom_heading'); ?></div>
						<div class="left-container">
							<div class="left-heading"><?php echo get_field('panel_bottom_image_heading'); ?></div>
							<div class="left-text"><?php echo get_field('panel_bottom_image_text'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>