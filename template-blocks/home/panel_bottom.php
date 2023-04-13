<?php
$block_name = "home_panel_bottom";
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
		<div class="desktop">
			<div class="content1">
				<div class="content1-container">
					<div class="row">
						<div class="column1">
							<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('row1_column1_image')); ?>"></div>
							<div class="text"><?php echo get_field('row1_column1_text'); ?></div>
							<?php if (get_field('top_sub-heading')) : ?>
								<div class="sub-heading"><?php echo get_field('top_sub-heading'); ?></div>
							<?php endif; ?>
							<div class="border-bottom"></div>
						</div>
						<div class="column2">	
							<div class="inner-row none">					
								<div class="you-deserve">YOU DESERVE</div>
							</div>
							<div class="inner-row none">
								<div class="heading-container">		
									<div class="heading"><?php echo get_field('row1_column2_heading'); ?></div>
									<div class="line">
										<div class="top"></div>
										<div class="bottom"></div>
									</div>
								</div>
							</div>
							<?php if (get_field('row1_column2_sub_heading')) : ?>
								<div class="inner-row">		
									<div class="sub-heading"><?php echo get_field('row1_column2_sub_heading'); ?></div>
								</div>
							<?php endif; ?>
							<?php if (get_field('row1_column2_text')) : ?>
								<div class="inner-row">		
									<div class="text"><?php echo get_field('row1_column2_text'); ?></div>
								</div>
							<?php endif; ?>
							<div class="inner-row bottom">		
								<div class="links">
									<?php 
										$link = get_field('row1_column2_button');
										if ($link): 
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											echo '<button class="button-blue button-small">';
												echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
											echo '</button>';
										endif; 
										$link = get_field('row1_column2_link');
										if ($link): 
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											echo '<div class="link"><a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '<i class="far fa-angle-right"></i></a></div>';
										endif; 
									?>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="content2">
				<div class="content2-container" style="background:url(<?php echo wp_get_attachment_url(get_field('row2_background_image'))?>" center center no-repeat;">
					<div class="row">
						<div class="you-deserve">YOU DESERVE</div>
						<div class="heading"><?php echo get_field('row2_heading'); ?></div>
						<?php if (get_field('row2_sub_heading')) : ?>
							<div class="sub-heading"><?php echo get_field('row2_sub_heading'); ?></div>
						<?php endif; ?>
						<?php 
							$link = get_field('row2_button');
							if ($link): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								echo '<button class="button-blue button-small">';
									echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
								echo '</button>';
							endif; 
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile">
			<div class="content">
				<div class="content-container">		
						<?php
							if( have_rows('rows') ):
								$c=0;
								while( have_rows('rows') ) : 
									the_row();
									$c++;
									echo '<div class="row row' . $c . '">';
										echo '<div class="col1">';
											if (get_sub_field('image')) :
												echo '<div class="image">';
													echo '<img src="' . wp_get_attachment_url(get_sub_field('image')) . '">';
												echo '</div>';
											endif;
										echo '</div>';
										echo '<div class="col2">';
											echo '<div class="you-deserve-container">';
												echo '<div class="you-deserve">YOU DESERVE</div>';
											echo '</div>';
											echo '<div class="heading">' . get_sub_field('heading') . '</div>';
										echo '</div>';
										echo '<div class="col3">';
											if (get_sub_field('sub-heading')) :
												echo '<div class="sub-heading">' . get_sub_field('sub-heading') . '</div>';
											endif;
										echo '</div>';
										echo '<div class="col4">';
											$link = get_sub_field('button');
											if ($link): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												echo '<button class="button-blue button-small">';
													echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
												echo '</button>';
											endif; 								
										echo '</div>';
										echo '<div class="col5">';
											$link = get_sub_field('link');
											if ($link): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												echo '<div class="link"><a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '<i class="far fa-angle-right"></i></a></div>';
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
	</div>
</section>