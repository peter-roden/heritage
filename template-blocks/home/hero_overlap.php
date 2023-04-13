<?php
$block_name = "home_hero_overlap";
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
				<div class="row">
					<div class="column1">
						<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('column1_image')); ?>"></div>
						<div class="column1-content">
							<div class="heading"><?php echo get_field('column1_heading'); ?></div>
							<?php 
								$link = get_field('column1_link');
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
						<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('column2_image')); ?>"></div>
						<div class="column2-content">
							<div class="heading"><?php echo get_field('column2_heading'); ?></div>
							<?php 
								$link = get_field('column2_link');
								if ($link): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									echo '<div class="link"><a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '<i class="far fa-angle-right"></i></a></div>';
								endif; 
							?>
						</div>
					</div>
					<div class="column3">
						<div class="column3-top-content">
							<div class="provider-search-container">
								<?php 
									$provider_search = get_field('provider_search');
									if ($provider_search) :
										echo '<a href="' . site_url() . '/provider-search/' . '">';
											echo '<div class="provider-search">';
												echo '<div class="col1"><i class="fas fa-search"></i></div>';
												echo '<div class="col2">Find Providers by Zipcode</div>';
												echo '<div class="col3"><button type="submit"><i class="fas fa-arrow-right"></i></button></div>';
											echo '</div>';
										echo '</a>';
									endif;
								?>
							</div>
							<div class="button-container">							
								<?php
									$link = get_field('button_link');
									if ($link) :					
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
						<div class="column3-bottom-content">
							<div class="column3-bottom-content-container">
								<div class="heading"><?php echo get_field('column3_heading'); ?></div>
								<div class="sub-heading"><?php echo get_field('column3_sub_heading'); ?></div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>
<div class="blue-background"></div>