<?php

global $wpdb;

$block_name = "provider_search";
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

<section id="<?php echo esc_attr($id); ?>" class="background <?php echo esc_attr($className); ?>">
	<div class="wrapper">
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column1">
						<div class="header-image">
							<img src="<?php echo wp_get_attachment_url(get_field('header_image')); ?>">
						</div>
						<div class="header-text"><?php echo get_field('header'); ?></div>
						<div class="header-mobile-text"><?php echo get_field('header_mobile'); ?></div>
					</div>					
					<div class="column2">
						<div id="errormessages"></div>
						<?php echo display_search_form(); ?>
					</div>
					<div class="column3">
						<div class="disclaimer-container">
							<div class="disclaimer">
								<?php echo get_field('mobile_disclaimer'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>