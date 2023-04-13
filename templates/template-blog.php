<style>
	#blog-landing-hero  {
		background:url("<?php echo wp_get_attachment_url(get_field('blog_background_image', 'option')); ?>") center center no-repeat;
		background-size:cover
	}
	@media screen and (max-width: 800px) {
		#blog-landing-hero  { 
			background:url("<?php echo wp_get_attachment_url(get_field('blog_background_image_mobile', 'option')); ?>") center center no-repeat;
			background-size:cover
		}
	}
</style>

<section id="blog-landing-hero" class="hero-image">
	<div class="content">
		<div class="you-deserve">
			<img src="<?php echo content_url(); ?>/uploads/2021/08/you-deserve.png">
		</div>
		<h1><?php echo get_field('blog_heading', 'option'); ?></h1>
		<p><?php echo get_field('blog_subheading', 'option'); ?></p>
		<?php
			$args = array(
				'post_type' 		=> 'post',
				'posts_per_page'	=> 1,
				'post_status' 		=> 'publish',
				'orderby' 			=> 'publish_date',
				'order' 			=> 'ASC',
				'meta_query' 		=> array(
					array(
						'key' => 'featured',
						'value' => '1',
						'compare' => '=='
					)
				)
			);
			$the_query = new WP_Query($args);
			if( $the_query->have_posts() ) :
				while( $the_query->have_posts() ):
					$the_query->the_post(); 
					echo '<div class="read-story-container">';
						echo '<a href="' . get_permalink() . '">Read Featured Story</a>';
					echo '</div>';
				endwhile;
			endif;
		?>
	</div>
</section>

<section id="posts">
	<div class="wrapper">
		<div class="category-container">
			<div class="heading">Categories</div>
			<div class="category-links-container">
				<?php
					$categories = get_categories();
					foreach($categories as $category) {
						if ($category->name != "Uncategorized") {
							echo '<div class="links"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
						}
					}
				?>
			</div>
		</div>
		<div class="posts-container">	
			<?php
				$args = array(
					'post_type' 		=> 'post',
					'posts_per_page'	=> -1,
					'post_status' 		=> 'publish',
					'orderby' 			=> 'publish_date',
					'order' 			=> 'ASC'
				);
				$the_query = new WP_Query($args);
				if( $the_query->have_posts() ) :		
					$c=0;
					while( $the_query->have_posts() ):
						$the_query->the_post(); 
										
						if (get_field('featured') == '1') :
							$c++;
							if ($c==1) :		
								echo '<div class="featured-post-container">';
									echo '<div class="featured-post">';
										echo '<div class="featured-image">';
											the_post_thumbnail('full');
										echo '</div>';
										echo '<div class="content-wrapper">';
												echo '<a href="' . get_the_permalink() . '"><h2 class="post-title">' . wp_kses_post(get_the_title()) . '</h1></a>';
												echo '<div class="post-date">' . 'Published ' . get_the_date('m/d/Y') . '</div>';
												echo '<div class="post-excerpt">' . wp_kses_post(get_the_excerpt()) . '</div>';
												echo '<div class="read-more"><a href="' . get_the_permalink() . '">READ MORE<i class="fal fa-angle-right"></i></a></div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							endif;
						endif;
					endwhile;
				endif;				
			
			?>
			
			<div class="blog-container">
				<?php
					if ( have_posts() ) :
						echo '<div class="blog-posts">';
							while ( have_posts() ) : the_post();  	
									echo '<div class="post">';
										echo '<div class="featured-image">';
											the_post_thumbnail('full');
										echo '</div>';
										echo '<div class="content-wrapper">';
												echo '<a href="' . get_the_permalink() . '"><h2 class="post-title">' . wp_kses_post(get_the_title()) . '</h1></a>';
												echo '<div class="post-date">' . 'Published ' . get_the_date('m/d/Y') . '</div>';
												echo '<div class="post-excerpt">' . wp_kses_post(get_the_excerpt()) . '</div>';
												echo '<div class="read-more"><a href="' . get_the_permalink() . '">READ MORE<i class="fal fa-angle-right"></i></a></div>';
										echo '</div>';
									echo '</div>';
							endwhile;
						echo '</div>';
						echo '<div class="nav-container">';
							the_posts_pagination();				
						echo '</div>'; 
					else : 
		 				echo 'Sorry, no posts found.';
					endif;
				?>	
			</div>
			
		</div>	
	</div>
</section>