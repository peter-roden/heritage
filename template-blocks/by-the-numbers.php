<?php
	$block_name = "by-the-numbers";
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
	<div class="wrapper narrow">
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column1">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('heading'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content2">
			<div class="content2-container">						
				<div class="row">
				<?php
					if( have_rows('data_rows') ):
						while( have_rows('data_rows') ) : 
							the_row();
							echo '<div class="column">';
								echo '<div class="data-container">';
									echo '<div class="value">' . get_sub_field('value') . '</div>';
									echo '<div class="label">' . get_sub_field('label') . '</div>';
								echo '</div>';
							echo '</div>';
						endwhile;
					endif;
				?>
				</div>
			</div>
		</div>
		<div class="content3">
			<div class="content3-container">						
				<div class="row">
					<div class="column1">
						<img src="<?php echo wp_get_attachment_url(get_field('map_label_image')); ?>">
						<div class="link">
							<?php 
								$link = get_field('button');
								$icon = get_field('button_icon');
								if ($link): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									echo '<button class="button-blue button-small">';
										echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . $icon . esc_html( $link_title) . '</a>';
									echo '</button>';
								endif; 
							?>
						</div>
					</div>
					<div class="column2">
						<img src="<?php echo wp_get_attachment_url(get_field('map_image')); ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>