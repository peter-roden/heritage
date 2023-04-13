<?php get_header(); ?>

<style>
	#search-landing-hero  {
		background:url("<?php echo wp_get_attachment_url(get_field('search_background_image', 'option')); ?>") center center no-repeat;
		background-size:cover
	}
	@media screen and (max-width: 800px) {
		#search-landing-hero  { 
			background:url("<?php echo wp_get_attachment_url(get_field('search_background_image_mobile', 'option')); ?>") center center no-repeat;
			background-size:cover
		}
	}
</style>

<section id="search-landing-hero" class="hero-image">
	<div class="content">
		<div class="you-deserve">
			<img src="<?php echo content_url(); ?>/uploads/2021/08/you-deserve.png">
		</div>
		<h1><?php echo get_field('search_heading', 'option'); ?></h1>
		<p><?php echo get_field('search_subheading', 'option'); ?></p>
	</div>
</section>

<section id="search-results">
	<div class="wrapper">
		<h1>Search Results</h1>
		<?php 
			global $wp_query;
			if ($wp_query->found_posts == 1) :
				echo '<div class="found">' . $wp_query->found_posts . ' result found for "' . get_search_query() . '</div>';
			else :
				echo '<div class="found">' . $wp_query->found_posts . ' results found for "' . get_search_query() . '</div>';
			endif;
		?>
		<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="result">
				<div class="title"><?php the_title(); ?></div>
  				<div class="read-more"><a class="button" href="<?php the_permalink() ?>">Read More<i class="fal fa-angle-right"></i></a></div>
			</div>
		<?php endwhile; ?>
		<?php the_posts_navigation([
			'prev_text'          => '← Prev',
			'next_text'          => 'Next →'
		]); ?>
	</div>
</section>

<?php get_footer(); ?>