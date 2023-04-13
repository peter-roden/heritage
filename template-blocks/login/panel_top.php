<?php
$block_name = "login_panel_top";
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
	<div class="content1">
		<div class="wrapper">
			<div class="content1-container">
				<div class="row1">
					<div class="heading-container">
						<div class="heading"><?php echo get_field('heading'); ?></div>
						<?php if (get_field('sub_heading')) : ?>
							<div class="sub-heading"><?php echo get_field('sub_heading'); ?></div>
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
					<?php 
						if (have_rows('personae')) :
							while (have_rows('personae') ) : 
								the_row();
									echo '<div class="column">';
										echo '<img src="' . get_sub_field("image") . '">';
										echo '<div class="heading" style="color:' . get_sub_field("color") . ';">' . get_sub_field("heading") . '</div>';
										if (get_sub_field("description")) :
											echo '<div class="description">' . get_sub_field("description") . '</div>';
										endif;
										echo '<div class="link" style="background-color:' . get_sub_field("color") . ';">';
											echo '<a href="' . get_sub_field("login_url") . '"><i class="fas fa-lock"></i>LOGIN</a>';
										echo '</div>';
									echo '</div>';
							endwhile;
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
