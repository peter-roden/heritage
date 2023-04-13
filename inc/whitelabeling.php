<?php

// Menus
function menus_setup() {
	register_nav_menus( array(
			'primary' 	=> esc_html__('Primary Menu'),
			'secondary' => esc_html__('Secondary Menu')
	) );
}
add_action( 'after_setup_theme', 'menus_setup' );

// Featured image in posts
function featured_image_support () {
	add_theme_support( 'post-thumbnails');
}
add_action( 'after_setup_theme', 'featured_image_support' );
// favicon to front and backend
function add_favicon() {
?>
   <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" rel="shortcut icon">
<?php
}
add_action('wp_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

//Body Classes
function add_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_body_class' );

// Admin Dashboard Styles
function admin_styles() {
  echo '<style>
	#tagsdiv-topics { display: none; } 
  </style>';
}
add_action('admin_head', 'admin_styles');

// custom ACF Color palette
function acf_custom_colors(){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			if(typeof acf !== 'undefined'){
				// custom colors
				var palette = ["000000","0497CF","143062","275CBA","383A3F","437499","54CAF3","803938","8697B6","97B4B9","A0A7B6","BF1E2E","E0A03C","FAAB12","FAFAFA","FFFFFF"];

				// when initially loaded find existing colorpickers and set the palette
				acf.add_action('load', function(){
					$('input.wp-color-picker').each(function() {
						$(this).iris('option', 'palettes', palette);
					});
				});

				// if appended element only modify the new element's palette
				acf.add_action('append', function(el) {
					$(el).find('input.wp-color-picker').iris('option', 'palettes', palette);
				});
			}
			$("span.mce-txt").text(function () {
				return $(this).text().replace("Georgia", "SourceSansPro"); 
			});
		});
	</script>
	<?php
}
add_action('admin_print_scripts', 'acf_custom_colors', 99);

// add ACF options
if(function_exists('acf_add_options_page')){
	acf_add_options_page();
	acf_add_options_sub_page('Site Options');
}

// add extra buttons/dropdowns
function tinymce_add_buttons($buttons){
	 array_unshift($buttons, 'styleselect','fontselect');
	 // array_splice($buttons, 5, 0, 'underline');
	return $buttons;
}
add_filter('mce_buttons', 'tinymce_add_buttons');

// custom tinymce formats
add_filter('tiny_mce_before_init', 'tinymce_before_init');
function tinymce_before_init($settings){

	// custom wysiwyg color palettes
	$color_string = '[	"000000","Black",		
						"0497CF","MediumBlue",	
						"143062","Navy",			
						"275CBA","Blue",			
						"383A3F","MidGrey",		
						"437499","BlueGrey",		
						"54CAF3","LightBlue",	
						"803938","Crimson",		
						"8697B6","Lilac",		
						"97B4B9","Teal",			
						"A0A7B6","Grey",			
						"BF1E2E","Red",			
						"E0A03C","Gold",						
						"FAAB12","Yellow",			
						"FAFAFA","LightGrey",
						"FFFFFF","White" ]';
						
	$settings['textcolor_map'] = $color_string;

	// fonts
	$font_formats = "SourceSansPro=source-sans-pro";

	   $settings['font_formats'] = $font_formats;
	   // show "kitchen sink"
	   $settings['wordpress_adv_hidden'] = false;


	return $settings;
}

?>