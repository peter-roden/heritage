<?php
$block_name = "two_column_with_downloads";
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
		<?php
			if( have_rows('columns') ):
				echo '<div class="row">';
				while( have_rows('columns') ) : the_row();
					echo '<div class="column">';
						echo '<a href="' . get_sub_field('download') . '" target="_blank">';
							echo '<div class="heading">' . get_sub_field('heading') . '</div>';
						echo '</a>';
						echo '<div class="text">' . get_sub_field('text') . '</div>';
						echo '<a class="download" href="' . get_sub_field('download') . '" target="_blank">';
							echo '<i class="fa-solid fa-arrow-down-to-line"></i>' . 'Download';
						echo '</a>'; 
					echo '</div>';
				endwhile;
				echo '</div>';
			endif;
		?>
	</div>
</section>