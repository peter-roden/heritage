<?php
$block_name = "login_panel_middle";
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
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column">
						<div class="heading"><?php echo get_field('heading'); ?></div>
						<?php
							if (get_field('sub_heading')) :
								echo '<div class="sub-heading">' . get_field('sub_heading') . '</div>';
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>