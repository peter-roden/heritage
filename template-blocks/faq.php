<?php
$block_name = "faq";
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

<section id="<?php echo esc_attr($id); ?>" class="faq-background <?php echo esc_attr($className); ?>">
	<div class="wrapper narrow">
		<div class="content1">
			<div class="content1-container">
				<div class="row">
					<div class="column1">
						<div class="heading-container">
							<div class="heading"><?php echo get_field('heading'); ?></div>
						</div>
						<div class="clipart">
							<img src="<?php echo wp_get_attachment_url(get_field('clip_art_image')); ?>">
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
						echo '<div class="questions-answers-container">';
							
							$questions_answers=0;
							$terms = get_field('topics');
							if ($terms):
								foreach($terms as $term) :

									$questions_answers++;
									if ($questions_answers % 2 == 0) {
										echo '<div class="questions-answers right">';
									} else {
										echo '<div class="questions-answers left">';
									}

										echo '<div class="subject-container">';
											echo '<div class="subject">' . $term->name . '</div>';
										echo '</div>';

										$args = array (
												'post_type' 		=> 'faqs',
												'posts_per_page' 	=> -1,
												'post_status' 		=> 'publish',
												'tax_query' 		=> array (
													array(
														'taxonomy' 	=> 'topics',
														'field'     => 'term_id',
														'terms' 	=> $term->term_id
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
														echo '<a id="' . $term->term_id . 'qa-' . $c . '">';
															echo '<div class="chevron"><i class="far fa-chevron-down"></i></div>';
														echo '</a>';
													echo '</div>';
													echo '<div id="' . $term->term_id . 'answer-' . $c . '" class="answer" style="display:none;">'   . get_field('answer', get_the_id()) . '</div>';
													echo '<script>';
														echo 'jQuery(document).ready(function($){';
															echo '$("a#' . $term->term_id. 'qa-' . $c . '").click(function(){';
																echo '$("#' . $term->term_id . 'answer-' . $c . '").toggle();';
																echo '$("a#' . $term->term_id . 'qa-' . $c . ' .chevron i").toggleClass("fa-chevron-down fa-chevron-up")';
															echo '});';
														echo '});';
													echo '</script>';
												echo '</div>';
											endwhile;	
										endif;		
										
									echo '</div>';	

								endforeach;
						
							else:
								echo 'No Topics<br>';
							endif;
							
						echo '</div>';
				?>
				</div>
			</div>
		</div>
	</div>
</section>