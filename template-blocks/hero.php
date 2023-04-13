<?php
	$block_name = "hero";
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
				background:url("<?php echo wp_get_attachment_url(get_field('background_image_mobile')); ?>") center center no-repeat;
				background-size:cover
			}
		}
	</style>
	<?php
		$type = get_field('type');
		switch (get_post_field('post_name')) {
			case 'home' :
				echo '<section id="' . esc_attr($id). '" class="hero-image hero-tall ' .esc_attr($className) . '">'; 
					echo '<div class="wrapper narrow hero-tall">';
				break;
			case 'about-us' :
				echo '<section id="' . esc_attr($id). '" class="hero-image hero-tall ' .esc_attr($className) . '">'; 
					echo '<div class="wrapper narrow hero-tall">';
				break;
			default :
				echo '<section id="' . esc_attr($id). '" class="hero-image hero-small ' .esc_attr($className) . '">'; 
					echo '<div class="wrapper narrow hero-tall">';
		}
	?>	
		<?php if ($type == 'Single') : ?>
			<div class="single">
				<div class="content">
					<div class="single"><h1><?php echo get_field('single_line'); ?></h1></div>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ($type == 'Multiple') : ?>
			<?php
				global $post;
				$slug = $post->post_name;
			?>
			<?php if (get_field('happy_holiday')) : ?>
					<div class="multiple happy-holiday">
			<?php else: ?>
				<div class="multiple">
			<?php endif; ?>
				<div class="content">
					<div class="you-deserve">
						<?php
						if (get_field('happy_holiday')) :
							echo '<img src="' . content_url() .'/uploads/2022/12/happy-holidays.png">';
						else :
							if ($slug == 'login') : 
								echo '<img src="' . content_url() .'/uploads/2022/02/you-deserve-blue.png">';
							elseif ($slug == 'provider-updates') :
								echo '<img src="' . content_url() .'/uploads/2022/10/provider-updates-stay-informed.png">';
							else :
								echo '<img src="' . content_url() .'/uploads/2021/08/you-deserve.png">';
							endif;
						endif;
						?>
					</div>
					<?php
						if ($slug == 'login') : 
							echo '<h1 class="login">' . get_field('heading') . '</h1>';
						else :
							echo '<h1>' . get_field('heading') . '</h1>';
						endif;
					?>
					<?php if (get_field('heading_border')) : ?>
						<style>
							h1:after {
								content: '';
								position: absolute;
								bottom: -20px;
								left: 0;
								width: 80%;
								border-top: 1px solid #FFFFFF;
							}
						</style>
					<?php endif; ?>
					<?php if (get_field('sub_heading')) : ?>
						<div class="sub-heading"><?php echo get_field('sub_heading'); ?></div>
					<?php endif; ?>
					<?php 
						if (get_field('button')) : 
								$style 	= get_field('button_style');
								$link	= get_field('button_link');
								$icon	= get_field('button_icon');
								$text	= get_field('button_text');
								if ($style == 'Large') { 
									echo '<button class="button-blue button-large">';
								} elseif ($style == 'Small') {
									echo '<button class="button-blue button-small">';
								} 
									echo '<a href="' . $link . '">' . $icon . $text . '</a>';
								echo '</button>';
						endif; 
					?>
				</div>
			</div>
		<?php endif; ?>
		
	</div>
</section>