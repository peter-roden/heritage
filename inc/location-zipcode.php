<?php

add_action("wp_ajax_location_zipcode", "location_zipcode");
add_action("wp_ajax_nopriv_location_zipcode", "location_zipcode");

function location_zipcode(){

	unset($_SESSION['location-zipcode']);
	$_SESSION['location-zipcode'] = $_POST['zipcode'];

}

?>