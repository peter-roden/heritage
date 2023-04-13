<?php
$block_name = "two_column_with_faq";
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
	<?php 
		global $post;
		$slug = $post->post_name;
		if ($slug == 'provider-search') { 
			echo '<div class="wrapper" style="margin-top:100px;padding-left:50px;padding-right:50px;">';
		} else {
			echo '<div class="wrapper narrow">';
		}
	?>
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column1">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('heading'); ?></div>
							<?php if (get_field('sub-heading')) : ?>
								<div class="sub-heading"><?php echo get_field('sub-heading'); ?></div>
							<?php endif; ?>
							<?php	
							$link = get_field('button');
							if ($link): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								echo '<button class="button-blue button-small">';
									echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
								echo '</button>';
							endif;
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content2">
			<div class="content2-container">						
				<div class="row">
					<div class="column2">
					<?php
					if (get_field('faq_topic')) :
						$faq_topic = get_field('faq_topic');		
						$args = array (
							'post_type' 		=> 'faqs',
							'posts_per_page' 	=> -1,
							'post_status' 		=> 'publish',
							'tax_query' 		=> array (
								array(
									'taxonomy' 	=> 'topics',
									'field'     => 'term_id',
									'terms' 	=> $faq_topic
								)
							)
						);						
						$the_query = new WP_Query($args);
						if ( $the_query->have_posts() ) :
							$c=0;
							while( $the_query->have_posts() ):
								$the_query->the_post(); 			
								echo '<div class="qa">';
									$c++;	
									echo '<div class="question-container">';
										echo '<div class="question">' . get_field('question', get_the_id()) . '</div>';
										echo '<a id="qa-' . $c . '">';
											echo '<div class="chevron"><i class="far fa-chevron-down"></i></div>';
										echo '</a>';
									echo '</div>';
									echo '<div id="answer-' . $c . '" class="answer" style="display:none;">'   . get_field('answer', get_the_id()) . '</div>';
									echo '<script>';
										echo 'jQuery(document).ready(function($){';
											echo '$("a#qa-' . $c . '").click(function(){';
												echo '$("#answer-' . $c . '").toggle();';
												echo '$("a#qa-' . $c . ' .chevron i").toggleClass("fa-chevron-down fa-chevron-up")';
											echo '});';
										echo '});';
									echo '</script>';
								echo '</div>';
							endwhile;
						endif;
					endif;
				?>
				</div>
			</div>
		</div>
	</div>
</section>