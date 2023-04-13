<?php
$block_name = "about_us_panel_top";
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

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background:url('<?php echo site_url(); ?>/wp-content/uploads/2021/07/section-background.png') center center no-repeat;background-size:cover;">
	<div class="wrapper">
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column1">
						<div class="tagline"><?php echo get_field('tagline'); ?></div>
					</div>
					<div class="column2">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('top_heading'); ?></div>
							<?php if (get_field('top_sub-heading')) : ?>
								<div class="sub-heading"><?php echo get_field('top_sub-heading'); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content2">
			<div class="content2-container">						
				<div class="row">
					<?php
					if( have_rows('columns') ):
						while( have_rows('columns') ) : 
							the_row();
							echo '<div class="column">';
								if (get_sub_field('image')) :
									echo '<img src="' . wp_get_attachment_url(get_sub_field('image')) . '">';
								endif;
								echo '<div class="heading-container">';
									echo '<div class="heading">' . get_sub_field('heading') . '</div>';
									if (get_sub_field('sub_heading')) :
										echo '<div class="sub-heading">' . get_sub_field('sub_heading') . '</div>';
									endif;
								echo '</div>';
							echo '</div>';
						endwhile;
					endif;
				?>
				</div>
			</div>
		</div>
	</div>
</section>