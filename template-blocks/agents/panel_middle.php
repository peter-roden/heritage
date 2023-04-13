<?php
$block_name = "agents_panel_middle";
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
					<div class="column1">
						<div class="heading"><?php echo get_field('left_heading'); ?></div>
						<?php
							if( have_rows('benefits') ):
								echo '<div class="benefits">';
									while( have_rows('benefits') ) : 
										the_row();
										echo '<div class="column">';
											echo '<div class="benefit">';
											 	echo '<div class="col1">';
												 	echo '<i class="fas fa-chevron-circle-right"></i>';
												echo '</div>';
												echo '<div class="col2">';
													echo get_sub_field('benefit');
												echo '</div>';
											echo '</div>';
										echo '</div>';
									endwhile;
								echo '</div>';
							endif;
						?>
						<?php	
							$link = get_field('button');
							if ($link): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								echo '<button class="button-blue button-small">';
									echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . get_field('button-icon') . esc_html( $link_title ) . '</a>';
								echo '</button>';
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="content2">
			<div class="content2-container">						
				<div class="row">
					<div class="column1">
						<img src="<?php echo wp_get_attachment_url(get_field('image')); ?>">
					</div>
					<div class="column2">
						<div class="heading"><?php echo get_field('right_heading'); ?></div>
						<div id="request-info">
							<div class="form-row">
								<?php	
									$shortcode = '[gravityform id="2" title="false" description="false" ajax="false"]';
									echo do_shortcode($shortcode);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>