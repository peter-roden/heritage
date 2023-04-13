<?php
	$block_name = "quote";
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

<?php

	$values   = get_field('quotes');
	if ($values) :

		$quote_id = $values[0];

		$type 		 	= get_field('type', $quote_id);
		$left_right  	= get_field('left_right', $quote_id);
		$text_color  	= get_field('text_color', $quote_id);
		$quote_color 	= get_field('quote_color', $quote_id);
		
		switch ($type) {
			case 'Individual' :
				echo '<section id="' . esc_attr($id). '" class="case-image case-small ' . esc_attr($className) . '">';
				break;
			case 'Case' :
				echo '<section id="' . esc_attr($id). '" class="case-image case-tall '  . esc_attr($className) . '">';
				break;
			break;
		}
				
		switch ($left_right) {
			case 'Left' :
				echo '<div class="left">';
				echo '<div class="content">';
				break;
			case 'Right' :
				echo '<div class="right">';
				echo '<div class="content">';
				break;
		}
		switch ($quote_color) {
			case 'White' :
				$quote_color_hex = "#FFFFFF";
				break;
			case 'Gold' :
				$quote_color_hex = "#e0a03c";
				break;
		}
?>

		<style>
			.quote_desktop {
				background:url("<?php echo wp_get_attachment_url(get_field('background_image', $quote_id)); ?>") center center no-repeat;
				background-size:cover;
			}
			.quote_mobile {
				background:url("<?php echo wp_get_attachment_url(get_field('background_mobile_image',$quote_id)); ?>") center center no-repeat;
				background-size:cover;
			}
		</style>
		<script>
			jQuery(document).ready(function($) {
				if ($(window).width() > 800) {
					$("section.quote").addClass("quote_desktop");
					$("section.quote").removeClass("quote_mobile");
				} else {
					$("section.quote").addClass("quote_mobile");
					$("section.quote").removeClass("quote_desktop");
				}	
				var resizeId;
				$(window).resize(function() {
					clearTimeout(resizeId);
					resizeId = setTimeout(doneResizing, 500);
				});
				function doneResizing(){
					if ($(window).width() > 800) {
						$("section.quote").addClass("quote_desktop");
						$("section.quote").removeClass("quote_mobile");
					} else {
						$("section.quote").addClass("quote_mobile");
						$("section.quote").removeClass("quote_desktop");
					}		
				}
			});
		</script>
		
		<?php if ($type == 'Individual') : ?>
			<div class="individual">
				<blockquote>
					<div class="quotation" style="color:<?php echo $text_color; ?>"><?php echo get_field('quote',$quote_id); ?></div>
				</blockquote>
				<style>blockquote:before { color: <?php echo $quote_color_hex; ?>; }</style>
				<div class="individual-content">
					<div class="name" style="color:<?php echo $text_color; ?>"><?php echo get_field('citation',$quote_id); ?></div>
					<div class="title" style="color:<?php echo $text_color; ?>"><?php echo get_field('sub-citation',$quote_id); ?></div>
				</div>
			</div>
		<?php endif; ?>
	
		<?php if ($type == 'Case') : ?>
			<div class="case">
				<blockquote>
					<div class="quotation" style="color:<?php echo $text_color; ?>"><?php echo get_field('quote',$quote_id); ?></div>
				</blockquote>
				<div class="case-content">
					<div class="text"><?php echo get_field('case_text',$quote_id); ?></div>
					<div class="links">
						<?php if (get_field('company_logo',$quote_id)) : ?>
							<?php if (get_field('company_link',$quote_id)) { echo '<a href="' . get_field('company_link',$quote_id) .'" target="_blank">'; } ?> 
							<img src="<?php echo wp_get_attachment_url(get_field('company_logo',$quote_id)); ?>">
							<?php if (get_field('company_link',$quote_id)) { echo '</a>'; } ?> 
						<?php endif; ?>
						<button class="button-blue button-small"><a href="<?php echo get_field('case_study_link',$quote_id); ?>" target="_blank">SEE THE CASE STUDY</a></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

	<?php endif; ?>

</div>
</div>
</div>
</section>