jQuery(document).ready(function($){
	if($(".gform_wrapper #gform_1 #validation_message_1_1").length != 0) {
		$(".gform_wrapper #gform_1 #field_1_1").prepend('<style>.gform_wrapper #gform_1 #field_1_1:before{top: 20% !important;}</style>');
	}
	if($(".gform_wrapper #gform_1 #validation_message_1_4").length != 0) {
		$(".gform_wrapper #gform_1 #field_1_4").prepend('<style>.gform_wrapper #gform_1 #field_1_4:before{top: 20% !important;}</style>');
		if ($(window).width() < 641) {
			$(".gform_wrapper #gform_1 #field_1_5").prepend('<style>.gform_wrapper #gform_1 #field_1_5:before{top: 50% !important;}</style>');
		} else {
			$(".gform_wrapper #gform_1 #field_1_5").prepend('<style>.gform_wrapper #gform_1 #field_1_5:before{top: 20% !important;}</style>');
		}
	}
});