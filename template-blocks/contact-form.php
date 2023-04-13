<?php
$block_name = "contact_form";
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

<section id="<?php echo esc_attr($id); ?>" class="contact-background <?php echo esc_attr($className); ?>">
	<div class="wrapper">
		<div class="content">
			<div class="content-container">
				<div class="row">
					<div class="column">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('heading'); ?></div>
							<?php if (get_field('sub_heading')) : ?>
								<div class="sub-heading"><?php echo get_field('sub_heading'); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>