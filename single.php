<?php get_header(); ?>

<div class="post-container">

	<?php while ( have_posts() ) : the_post(); 	?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
					  
			<div class="header-wrap" style="background-image: url('<?php echo $backgroundImg[0]; ?>'), linear-gradient(90deg, rgba(155,155,156,1) 0%, rgba(255,141,0,1) 100%);background-blend-mode: multiply; background-size:cover;"></div>
			
			<div class="content-container">
				
				<div class="overlap">
			
					<div class="entry-title"><h1><?php the_title(); ?></h1></div>	
					
					<div class="back">
						<a href="/blog/"><i class="fal fa-angle-double-left"></i> Back to Blog</a>
					</div>				
	
					<div class="meta">
						<div class="date">Published <?php echo get_the_date('m/d/Y'); ?></div>
						<div class="author">by <?php echo get_the_author(); ?></div>
						<?php
							$categories = get_the_category();
							$c=0;
							foreach ($categories as $cat) {
								$c++;
								if ($cat->cat_name != 'Uncategorized') {
									if ($c == 1) { echo '<div class="categories">In '; }
									echo '<a href="/category/' . str_replace(" ", "-", $cat->cat_name) . '">' . $cat->cat_name . '</a> ';
								}
							}
							if ($c > 0) { echo '</div>'; }
						?>
					</div>
			
				</div>
			</div>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		</div>

	<?php endwhile; ?>

</div>
<?php get_footer(); ?>