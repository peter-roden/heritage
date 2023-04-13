jQuery(document).ready(function($){
	var offset = 100;
	var speed = 250;
	var duration = 500;
	$(window).scroll(function(){
		if ($(this).scrollTop() < offset) {
				  $('#scroll-to-top') .fadeOut(duration);
		} else {
				  $('#scroll-to-top') .fadeIn(duration);
		}
	});
	$('#scroll-to-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
	});
});