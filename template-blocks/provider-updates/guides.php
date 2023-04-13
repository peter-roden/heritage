<?php
$block_name = "provider_updates_guides";
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
			<?php
				echo '<div class="heading">' . get_field('heading') . '</div>';
				echo '<div class="desktop-image">';
					echo '<img src="' . get_field('desktop_image') . '">';
				echo '</div>';
				echo '<div class="mobile-image">';
					echo '<img src="' . get_field('mobile_image') . '">';
				echo '</div>';
			?>
		</div>
	</div>
</section>