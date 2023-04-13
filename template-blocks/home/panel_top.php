<?php
$block_name = "home_panel_top";
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
	<div class="desktop">
		<div class="content1">
			<div class="wrapper">
				<div class="content1-container">
					<div class="row1">
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
			<div class="wrapper wide">
				<div class="content2-container">						
					<div class="row">
						<div class="column1">
							<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('column_1_image')); ?>"></div>
							<?php if (get_field('column_1_text')) : ?>
								<div class="text-container">
									<div class="text"><?php echo get_field('column_1_text'); ?></div>
								</div>
							<?php endif; ?>
						</div>
						<div class="column2">
							<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('column_2_image')); ?>"></div>
							<?php if (get_field('column_2_text')) : ?>
								<div class="text-container">
									<div class="text"><?php echo get_field('column_2_text'); ?></div>
								</div>
							<?php endif; ?>
						</div>
						<div class="column3">
							<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('column_3_image')); ?>"></div>
							<?php if (get_field('column_3_text')) : ?>
								<div class="text-container">
									<div class="text"><?php echo get_field('column_3_text'); ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content3">
			<div class="wrapper">
				<div class="content3-container">	
					<div class="row">
						<div class="column1">
							<div class="you-deserve">YOU DESERVE</div>
							<div class="heading"><?php echo get_field('bottom_heading'); ?></div>
							<?php if (get_field('bottom_sub_heading')) : ?>
								<div class="sub-heading"><?php echo get_field('bottom_sub_heading'); ?></div>
							<?php endif; ?>
							<div class="links">
								<?php 
									$link = get_field('bottom_button');
									if ($link): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										echo '<button class="button-blue button-small">';
											echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
										echo '</button>';
									endif; 
									$link = get_field('bottom_link');
									if ($link): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										echo '<div class="link"><a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '<i class="far fa-angle-right"></i></a></div>';
									endif; 
								?>
							</div>
						</div>
						<div class="column2">
							<?php
								if( have_rows('logos') ):
									echo '<div class="logo-row">';
										while( have_rows('logos') ) : 
											the_row();
											echo '<div class="logo-column">';
												if (get_sub_field('link')) { echo '<a href="' . get_sub_field('link') . '">'; }
													echo '<img src="' . wp_get_attachment_url(get_sub_field('logo')) . '">';
												if (get_sub_field('link')) { echo '</a>'; }
											echo '</div>';
										endwhile;
									echo '</div>';
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="mobile">
		<div class="content">
			<div class="wrapper">
				<div class="content-container">
					<div class="row">
						<div class="col1" >
							<span class="line-top"></span>
							<span class="line-right"></span>
							<span class="line-bottom"></span>
							<span class="line-left"></span>
							<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('mobile_image')); ?>"></div>
						</div>
						<div class="col2">
							<div class="heading"><?php echo get_field('mobile_heading'); ?></div>
						</div>
						<div class="col3">
							<div class="sub-heading"><?php echo get_field('mobile_sub_heading'); ?></div>
						</div>
						<div class="col4">
							<div class="text"><?php echo get_field('mobile_text'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>