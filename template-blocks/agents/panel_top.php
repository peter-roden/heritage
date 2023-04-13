<?php
$block_name = "agents_panel_top";
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
		<div class="content">
			<div class="content-container">
				<div class="row">
					<div class="column1">
						<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('image')); ?>"></div>
					</div>
					<div class="column2">
						<div class="heading"><?php echo get_field('heading'); ?></div>
						<div class="sub-heading"><?php echo get_field('sub_heading'); ?></div>
						<?php	
							$link = get_field('button');
							if ($link): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								echo '<button class="button-blue button-small">';
									echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . '<i class="fas fa-download"></i>' . get_field('button_icon') . esc_html( $link_title ) . '</a>';
								echo '</button>';
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>