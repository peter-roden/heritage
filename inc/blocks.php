<?php 

// buildcreate block category
function bc_plugin_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'bc',
				'title' => __( 'buildcreate', 'buildcreate' ),
			],
		]
	);
}
add_action( 'block_categories', 'bc_plugin_block_categories', 10, 2 );

// custom ACF blocks
add_action('acf/init', 'bc_acf_blocks_init');
function bc_acf_blocks_init() {

	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
			'name'              => 'about-us-panel-middle',
			'title'             => __('About Us/Panel Middle'),
			'description'       => __('The panel of two rows near the middle of the About Us Page'),
			'render_template'   => 'template-blocks/about-us/panel_middle.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'about-us-panel-top',
			'title'             => __('About Us/Panel Top'),
			'description'       => __('The panel of two rows near the top of the About Us Page'),
			'render_template'   => 'template-blocks/about-us/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'activate-benefits',
			'title'             => __('Activate Benefits'),
			'description'       => __('Activate Benefits'),
			'render_template'   => 'template-blocks/activate-benefits.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'agents-panel-middle',
			'title'             => __('Agents/Panel Middle'),
			'description'       => __('The panel of two rows near the middle of the Agents Page'),
			'render_template'   => 'template-blocks/agents/panel_middle.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'agents-panel-top',
			'title'             => __('Agents/Panel Top'),
			'description'       => __('The panel of two rows near the top of the Agents Page'),
			'render_template'   => 'template-blocks/agents/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'amplifon-panel-bottom',
			'title'             => __('Amplifon/Panel Bottom'),
			'description'       => __('The panel of two columns near the bottom of the Amplifon Page'),
			'render_template'   => 'template-blocks/amplifon/panel_bottom.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'amplifon-panel-middle',
			'title'             => __('Amplifon/Panel Middle'),
			'description'       => __('The panel of two columns near the middle of the Amplifon Page'),
			'render_template'   => 'template-blocks/amplifon/panel_middle.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'amplifon-panel-top',
			'title'             => __('Amplifon/Panel Top'),
			'description'       => __('The panel of two columns near the top of the Amplifon Page'),
			'render_template'   => 'template-blocks/amplifon/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'by-the-numbers',
			'title'             => __('By the Numbers'),
			'description'       => __('Statistics and Map'),
			'render_template'   => 'template-blocks/by-the-numbers.php',
			'category'          => 'bc',
			'icon'				=> 'analytics'
		));
		acf_register_block_type(array(
			'name'              => 'clients-panel-top',
			'title'             => __('Clients/Panel Top'),
			'description'       => __('The panel near the top of the Clients Page'),
			'render_template'   => 'template-blocks/clients/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'clients-panel-middle',
			'title'             => __('Clients/Panel Middle'),
			'description'       => __('The panel near the middle of the Clients Page'),
			'render_template'   => 'template-blocks/clients/panel_middle.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'contact-panel-top',
			'title'             => __('Contact/Panel Top'),
			'description'       => __('The panel of two rows near the top of the Contact Page'),
			'render_template'   => 'template-blocks/contact/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'contact-form',
			'title'             => __('Contact Form'),
			'description'       => __('Contact Form'),
			'render_template'   => 'template-blocks/contact-form.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'hero',
			'title'             => __('Hero'),
			'description'       => __('The Hero at the top of a page.'),
			'render_template'   => 'template-blocks/hero.php',
			'category'          => 'bc',
			'icon'				=> 'id-alt'
		));
		acf_register_block_type(array(
			'name'              => 'faq',
			'title'             => __('FAQ'),
			'description'       => __('Frequently Asked Questions'),
			'render_template'   => 'template-blocks/faq.php',
			'category'          => 'bc',
			'icon'				=> 'editor-help'
		));
		acf_register_block_type(array(
			'name'              => 'hearing-loss',
			'title'             => __('Hearing Loss'),
			'description'       => __('Hearing Loss special for members'),
			'render_template'   => 'template-blocks/hearing-loss.php',
			'category'          => 'bc',
			'icon'				=> 'format-audio'
		));
		acf_register_block_type(array(
			'name'              => 'home-panel-bottom',
			'title'             => __('Home/Panel Bottom'),
			'description'       => __('The panel of three rows near the bottom of the Home Page'),
			'render_template'   => 'template-blocks/home/panel_bottom.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'home-hero-overlap',
			'title'             => __('Home/Hero Overlap'),
			'description'       => __('The three column row that overlaps the Home page Hero'),
			'render_template'   => 'template-blocks/home/hero_overlap.php',
			'category'          => 'bc',
			'icon'				=> 'grid-view'
		));
		acf_register_block_type(array(
			'name'              => 'home-panel-top',
			'title'             => __('Home/Panel Top'),
			'description'       => __('The panel of three rows near the top of the Home Page'),
			'render_template'   => 'template-blocks/home/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'lasik-panel-bottom',
			'title'             => __('Lasik/Panel Bottom'),
			'description'       => __('The panel of two columns near the bottom of the Lasik Page'),
			'render_template'   => 'template-blocks/lasik/panel_bottom.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'lasik-panel-middle',
			'title'             => __('Lasik/Panel Middle'),
			'description'       => __('The panel of two columns near the middle of the Lasik Page'),
			'render_template'   => 'template-blocks/lasik/panel_middle.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'lasik-panel-top',
			'title'             => __('Lasik/Panel Top'),
			'description'       => __('The panel of two columns near the top of the Lasik Page'),
			'render_template'   => 'template-blocks/lasik/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'lasik',
			'title'             => __('Lasik'),
			'description'       => __('Lasik Special for Members'),
			'render_template'   => 'template-blocks/lasik/lasik.php',
			'category'          => 'bc',
			'icon'				=> 'share-alt'
		));
		acf_register_block_type(array(
			'name'              => 'login-panel-middle',
			'title'             => __('Login/Panel Middle'),
			'description'       => __('The panel near the middle of the login Page'),
			'render_template'   => 'template-blocks/login/panel_middle.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'login-panel-top',
			'title'             => __('Login/Panel Top'),
			'description'       => __('The panel near the top of the Login Page'),
			'render_template'   => 'template-blocks/login/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'members-panel-top',
			'title'             => __('Members/Panel Top'),
			'description'       => __('The panel of two columns near the top of the Members Page'),
			'render_template'   => 'template-blocks/members/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'nominate',
			'title'             => __('Nominate'),
			'description'       => __('Nominate your doctor or clinic'),
			'render_template'   => 'template-blocks/nominate.php',
			'category'          => 'bc',
			'icon'				=> 'pressthis'
		));
		acf_register_block_type(array(
			'name'              => 'page-not-found',
			'title'             => __('404 - Page Not Found'),
			'description'       => __('404 - Page Not Found'),
			'render_template'   => 'template-blocks/page-not-found.php',
			'category'          => 'bc',
			'icon'				=> 'location'
		));
		acf_register_block_type(array(
			'name'              => 'providers-panel-top',
			'title'             => __('Providers/Panel Top'),
			'description'       => __('The panel of two columns near the top of the Providers Page'),
			'render_template'   => 'template-blocks/providers/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'provider-search',
			'title'             => __('Provider Search'),
			'description'       => __('The Provider Search Page'),
			'render_template'   => 'template-blocks/search/provider-search.php',
			'category'          => 'bc',
			'icon'				=> 'search'
		));
		acf_register_block_type(array(
			'name'              => 'provider-search-results',
			'title'             => __('Provider Search Results'),
			'description'       => __('The Provider Search ResultsPage'),
			'render_template'   => 'template-blocks/search/provider-search-results.php',
			'category'          => 'bc',
			'icon'				=> 'list-view'
		));
		acf_register_block_type(array(
			'name'              => 'provider-updates-panel-top',
			'title'             => __('Provider Updates/Panel Top'),
			'description'       => __('The panel of two columns near the top of the Provider Updates Page'),
			'render_template'   => 'template-blocks/provider-updates/panel_top.php',
			'category'          => 'bc',
			'icon'				=> 'schedule'
		));
		acf_register_block_type(array(
			'name'              => 'provider-updates-phases',
			'title'             => __('Provider Updates/Phases'),
			'description'       => __('The panel the Provider Updates Phases'),
			'render_template'   => 'template-blocks/provider-updates/phases.php',
			'category'          => 'bc',
			'icon'				=> 'editor-ol'
		));
		acf_register_block_type(array(
			'name'              => 'provider-updates-phase-complete',
			'title'             => __('Provider Updates/Phase Complete'),
			'description'       => __('The panel the Provider Update Phase Complete'),
			'render_template'   => 'template-blocks/provider-updates/phase-complete.php',
			'category'          => 'bc',
			'icon'				=> 'editor-ol'
		));
		acf_register_block_type(array(
			'name'              => 'provider-updates-guides',
			'title'             => __('Provider Updates/Guides'),
			'description'       => __('The panel the Provider Updates Guides'),
			'render_template'   => 'template-blocks/provider-updates/guides.php',
			'category'          => 'bc',
			'icon'				=> 'editor-ol'
		));
		acf_register_block_type(array(
			'name'              => 'quote',
			'title'             => __('Quote'),
			'description'       => __('Select a Quote to display on the page'),
			'render_template'   => 'template-blocks/quote.php',
			'category'          => 'bc',
			'icon'				=> 'format-quote'
		));
		acf_register_block_type(array(
			'name'              => 'resources',
			'title'             => __('Resources'),
			'description'       => __('Resources download columns'),
			'render_template'   => 'template-blocks/resources.php',
			'category'          => 'bc',
			'icon'				=> 'list-view'
		));
		acf_register_block_type(array(
			'name'              => 'two-column-with-downloads',
			'title'             => __('Two Column with Downloads'),
			'description'       => __('Two Column with Downloads'),
			'render_template'   => 'template-blocks/provider-updates/two-column-with-downloads.php',
			'category'          => 'bc',
			'icon'				=> 'screenoptions'
		));
		acf_register_block_type(array(
			'name'              => 'two-column-with-faq',
			'title'             => __('Two Column with FAQ'),
			'description'       => __('Two Columns with FAQ on right'),
			'render_template'   => 'template-blocks/two-column-with-faq.php',
			'category'          => 'bc',
			'icon'				=> 'screenoptions'
		));
		acf_register_block_type(array(
			'name'              => 'wysiwyg',
			'title'             => __('Wysiwyg Editor'),
			'description'       => __('Simple What You See Is What You Get editor'),
			'render_template'   => 'template-blocks/wysiwyg.php',
			'category'          => 'bc',
			'icon'				=> 'edit'
		));
	}
}

// allowed block types
function bc_allowed_block_types() {
	
	$allowed_blocks = array();
	global $post; 
	
	switch ($post->post_name) {
		case 'home' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/home-hero-overlap',
				'acf/home-panel-bottom',
				'acf/home-panel-top'
			);
			break;
		case 'about-us' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/about-us-panel-middle',
				'acf/about-us-panel-top'
			);
			break;
		case 'agents' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/agents-panel-middle',
				'acf/agents-panel-top'
			);
			break;
		case 'amplifon' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/amplifon-panel-bottom',
				'acf/amplifon-panel-middle',
				'acf/amplifon-panel-top',
				'acf/activate-benefits',
				'gravityforms/form',
				'acf/contact-form'
			);
			break;
		case 'clients' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/clients-panel-middle',
				'acf/clients-panel-top'
			);
			break;
		case 'contact' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/contact-panel-top',
				'gravityforms/form'
			);
			break;
		case 'lasik' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/lasik-panel-bottom',
				'acf/lasik-panel-middle',
				'acf/lasik-panel-top',
				'acf/activate-benefits',
				'gravityforms/form',
				'acf/contact-form'
			);
			break;
		case 'login' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/login-panel-middle',
				'acf/login-panel-top',
				'gravityforms/form'
			);
			break;
		case 'members' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/members-panel-top'
			);
			break;
		case 'page-not-found' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/page-not-found'
			);
			break;
		case 'providers' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/providers-panel-top'
			);
			break;
		case 'provider-search' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/provider-search'
			);
			break;
		case 'provider-search-results' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/provider-search-results'
			);
			break;
		case 'provider-updates' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/two-column-with-downloads',
				'acf/wysiwyg',
				'acf/provider-updates-panel-top',
				'acf/provider-updates-guides',
				'acf/provider-updates-phases',
				'acf/provider-updates-phase-complete',
				'acf/activate-benefits',
				'gravityforms/form',
				'acf/contact-form'
			);
			break;
		case 'resources' :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg',
				'acf/resources'
			);
			break;
		default :
			$allowed_blocks = array (
				'acf/by-the-numbers',
				'acf/faq',
				'acf/hearing-loss',
				'acf/hero',
				'acf/lasik',
				'acf/nominate',
				'acf/quote',
				'acf/two-column-with-faq',
				'acf/wysiwyg'
			);
	}
	
	return $allowed_blocks;
	
}
add_filter( 'allowed_block_types', 'bc_allowed_block_types' );

// remove block patterns
function bc_remove_block_patterns() {
	remove_theme_support('core-block-patterns');
}
add_action('after_setup_theme', 'bc_remove_block_patterns');

?>