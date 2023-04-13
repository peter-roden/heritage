<?php
$block_name = "members_panel_top";
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

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background:url('<?php echo esc_attr($id); ?>/wp-content/uploads/2021/07/section-background.png') center center no-repeat;background-size:cover;">
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
						<div class="heading"><?php echo get_field('right_heading'); ?></div>
					</div>
					<div class="column2">
						<div class="column2-content">
							<div class="provider-search-container">
								<?php
									echo '<a href="' . site_url() . '/provider-search/' . '">';
										echo '<div class="provider-search">';
											echo '<div class="col1"><i class="fas fa-search"></i></div>';
											echo '<div class="col2"><span style="color:#000000 !important;">Find a provider by zip code</span></div>';
											echo '<div class="col3"><button type="submit"><i class="fas fa-arrow-right"></i></button></div>';
										echo '</div>';
									echo '</a>';
								?>
							</div>
						</div>
					</div>
					<div class="column3">
						<?php
							if( have_rows('links') ):
								while( have_rows('links') ) : 
									the_row();
									echo '<div class="link">';	
										$link = get_sub_field('link');		
										if ($link) :					
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . get_sub_field('link_icon') . esc_html( $link_title ) . '</a>';
										endif; 
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