<?php
$block_name = "provider_updates_phase_complete";
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
				echo '<div class="heading">' . '<i class="fa-solid fa-check"></i>' . get_field('heading') . '</div>';
				echo '<div class="text">' . get_field('text') . '</div>';
			?>
		</div>
	</div>
</section>