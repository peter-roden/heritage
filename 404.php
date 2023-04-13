<?php
/**
 * The template for displaying the 404 template.
 */

// get the themes header.php template.
get_header();

$not_found_page = get_page_by_title( 'Page not found' );

if ( null !== $not_found_page ) {

	$blocks = parse_blocks( $not_found_page->post_content );

	$content = '';

	foreach ( $blocks as $block ) {

		$content .= render_block( $block );
	}

	echo $content;

} else {

	?>
	<p><?php esc_html_e( 'Sorry but the page you are looking for cannot be found.', 'textdomain' ); ?></p>
	<?php

}

get_footer();