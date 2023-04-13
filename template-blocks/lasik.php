<?php
	$block_name = "lasik";
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
			background-image: none;
		}
	}
</style>

<section id="<?php echo esc_attr($id); ?>" class="lasik-background <?php echo esc_attr($className); ?>">
	<div class="wrapper">
		<div class="content">
			<div class="image"><img src="<?php echo wp_get_attachment_url(get_field('mobile_image')); ?>"></div>
			<div class="heading"><?php echo get_field('heading'); ?></div>
			<?php if (get_field('sub_heading')) : ?>
				<div class="sub-heading"><?php echo get_field('sub_heading'); ?></div>
			<?php endif; ?>
		<?php	
			$link = get_field('button');
			if ($link): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				echo '<div class="button-container">';
					echo '<button class="button-blue button-large">';
						echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
					echo '</button>';
				echo '</div>';
			endif;
		?>
		</div>
	</div>
</section>