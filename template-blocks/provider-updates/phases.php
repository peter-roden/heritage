<?php
$block_name = "provider_updates_phases";
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
				if( have_rows('phases') ):
					$phase = 0;
					while( have_rows('phases') ) : the_row();
						$phase++;
						if (count(get_field('phases')) == $phase) :
							$last = 'last';
						else :
							$last ='';
						endif;
						echo '<div class="phase ' . $last . '">';
							echo '<div class="heading">';
								echo 'Phase ' . $phase . ': ' . get_sub_field('heading');
							echo '</div>';
							echo '<div class="description">' . get_sub_field('description') . '</div>';
						echo '</div>';
					endwhile;
				endif;
			?>
		</div>
	</div>
</section>