<?php
$block_name = "contact_panel_top";
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
		background:url('<?php echo site_url(); ?>/wp-content/uploads/2021/07/section-background.png') center center no-repeat;
		background-size:cover
	}
	@media screen and (max-width: 800px) {
		#<?php echo esc_attr($id); ?>  { 
			background-image: none;
		}
	}
</style>

<section id="<?php echo esc_attr($id); ?>" class="contact-background <?php echo esc_attr($className); ?>">
	<div class="wrapper">
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('left_heading'); ?></div>
							<?php if (get_field('left_sub_heading')) : ?>
								<div class="sub-heading"><?php echo get_field('left_sub_heading'); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content2">
			<div class="content2-container">						
				<div class="row">
					<div class="column1">
						<div class="provider-search-container">
							<?php
								echo '<a href="' . site_url() . '/provider-search/' . '">';
									echo '<div class="provider-search">';
										echo '<div class="col1"><i class="fas fa-search"></i></div>';
										echo '<div class="col2">Find Providers by Zipcode</div>';
										echo '<div class="col3"><button type="submit"><i class="fas fa-arrow-right"></i></button></div>';
									echo '</div>';
								echo '</a>';
							?>
						</div>
					</div>
					<div class="column2">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('right_heading'); ?></div>
							<?php if (get_field('right_sub_heading')) : ?>
								<div class="sub-heading"><?php echo get_field('right_sub_heading'); ?></div>
							<?php endif; ?>
						</div>
					</div>
					<div class="column3">
						<?php	
							$link = get_field('button');
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
</section>