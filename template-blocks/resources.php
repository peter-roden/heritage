<?php
$block_name = "resources";
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
	<div class="wrapper">
		
		<div class="content1">
			<div class="content1-container">
				<div class="heading">Resources</div>
			</div>
		</div>

		<?php if( have_rows('topics') ): ?>

			<div class="content2">
				<div class="content2-container">
					<div class="row">		

						<?php while( have_rows('topics') ): the_row(); ?>
	
							<div class="column">

								<div class="topics-container">
									<div class="topic"><?php echo get_sub_field('topic'); ?></div>
								</div>

								<?php if( have_rows('downloads') ): ?>
									
									<?php while( have_rows('downloads') ): the_row(); ?>
									
										<?php 
											$download = get_sub_field('download');
											if( $download ): 
												$download_url 		= $download['url'];
												$download_title 	= $download['title'];
												$download_target 	= $download['target'] ? $download['target'] : '_self';
										?>
										
											<div class="downloads-container">
												<a class="download" href="<?php echo esc_url( $download_url ); ?>" target="<?php echo esc_attr( $download_target ); ?>"><i class="fas fa-download"></i><?php echo esc_html( $download_title ); ?></a>
											</div>
											
										<?php endif; ?>
			
									<?php endwhile; ?>
							
								<?php endif; ?>
							
							</div>

						<?php endwhile; ?>
						
					</div>
				</div>
			</div>
			
		<?php endif; ?>

	</div>
</section>