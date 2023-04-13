<?php

function import_license ($zipfile, $file, $table, $batch, $log_file) {

	global $wpdb;
	date_default_timezone_set('America/New_York'); 
	
	$query = 'TRUNCATE TABLE '. $wpdb->prefix  . 'hvp_' . $table;
	$wpdb->query($wpdb->prepare($query));
	
	$csv = WP_CONTENT_DIR . '/uploads/imports/' . $batch . '/' . $file;
	
	if (($handle = fopen($csv,"r")) !== FALSE) :
		
		$c=0;
		$r=-1;
		$query = '';
		$row  = array();
		$rows = array();
		
		while (($data = fgetcsv($handle, 200000, ",")) !== FALSE) :
		
			$c++; if ($c==1) {continue;}
			$r++;
			
			$rows[$r]['id'] 				= addslashes($data[0]);
			$rows[$r]['provider']			= addslashes($data[1]);
			$rows[$r]['description'] 		= addslashes($data[2]);
			$rows[$r]['state'] 				= addslashes($data[3]);
			$rows[$r]['license_no']			= addslashes($data[4]);
			$rows[$r]['date_issued'] 		= addslashes($data[5]);   
			if (strlen($rows[$r]['date_issued']) > 0) { $rows[$r]['date_issued'] = date('Y-m-d', strtotime($rows[$r]['date_issued'])); }
			$rows[$r]['expiration_date']	= addslashes($data[6]);  
			if (strlen($rows[$r]['expiration_date']) > 0) { $rows[$r]['expiration_date'] = date('Y-m-d', strtotime($rows[$r]['expiration_date'])); }
							
		endwhile;
		
		$rows = array_map("unserialize", array_unique(array_map("serialize", $rows)));
		
		fclose($handle);
	
	endif;
	
	$query .= 'INSERT INTO '. $wpdb->prefix  . 'hvp_' . $table .
	 '( id, 
		 provider, 
		description, 
		state, 
		license_no, 
		date_issued, 
		expiration_date )';
		
	$query .=  "VALUES ";	
	$c=0;
	foreach ($rows as $row) : 
		$c++;
		if ($c < count($rows)) {
			$query .= "('" . implode("','", $row) . "'),";
		} else {
			$query .= "('" . implode("','", $row) . "')";
		}	  
	endforeach;
		
	$result = $wpdb->query($wpdb->prepare($query)); 
	
	if ($result > 0 ) {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' processed ' . ($c-1) . ' records.' . PHP_EOL;
	} else {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' error processing' . PHP_EOL;
	}
	file_put_contents ($log_file, $log, FILE_APPEND);
	
}

function import_location ($zipfile, $file, $table, $batch, $log_file) {
	
	global $wpdb;
	date_default_timezone_set('America/New_York'); 
	
	$query = 'TRUNCATE TABLE '. $wpdb->prefix  . 'hvp_' . $table;
	$wpdb->query($wpdb->prepare($query));
	
	$csv = WP_CONTENT_DIR . '/uploads/imports/' . $batch . '/' . $file;
	
	if (($handle = fopen($csv,"r")) !== FALSE) :
		
		$c=0;
		$r=-1;
		$query = '';
		$row  = array();
		$rows = array();
		
		while (($data = fgetcsv($handle, 200000, ",")) !== FALSE) :
		
			$c++; if ($c==1) {continue;}
			$r++;
			
			$rows[$r]['id'] 							= addslashes($data[0]);			
			$rows[$r]['name']							= addslashes($data[1]);
			$rows[$r]['address1']						= addslashes($data[2]);
			$rows[$r]['address2']						= addslashes($data[3]);
			$rows[$r]['city']							= addslashes($data[4]);
			$rows[$r]['state']							= addslashes($data[5]);
			$rows[$r]['zipcode']						= addslashes($data[6]);
			$rows[$r]['zipcode_4']						= addslashes($data[7]);
			$rows[$r]['voice_phone']					= addslashes($data[8]);
			$rows[$r]['emg_phone']						= addslashes($data[9]);
			$rows[$r]['fax_phone']						= addslashes($data[10]);
			$rows[$r]['email']							= addslashes($data[11]);
			$rows[$r]['url']							= addslashes($data[12]);
			$rows[$r]['notes']							= addslashes($data[13]);
			$rows[$r]['handicap_access_flag']			= addslashes($data[14]);
			$rows[$r]['special_needs_patient_flag']		= addslashes($data[15]);
			$rows[$r]['contact_name']					= addslashes($data[16]);
			$rows[$r]['office_type']					= addslashes($data[17]);
			$rows[$r]['county']							= addslashes($data[18]);
			$rows[$r]['text_phone']						= addslashes($data[19]);
			$rows[$r]['medicaid_id']					= addslashes($data[20]);
			$rows[$r]['medicare_id']					= addslashes($data[21]);
			$rows[$r]['other_id1']						= addslashes($data[22]);
			$rows[$r]['other_id2']						= addslashes($data[23]);
			$rows[$r]['npi']							= addslashes($data[24]);
			$rows[$r]['public_transportation_flag']		= addslashes($data[25]);
			$rows[$r]['latitude']						= addslashes($data[26]);
			$rows[$r]['longitude']						= addslashes($data[27]);
			$rows[$r]['services']						= addslashes($data[28]);
			$rows[$r]['hours']							= addslashes($data[29]);
								
		endwhile;
		
		$rows = array_map("unserialize", array_unique(array_map("serialize", $rows)));
		
		fclose($handle);
	
	endif;	
	
	$query .= 'INSERT INTO '. $wpdb->prefix  . 'hvp_' . $table .
	 '(	id,
		name,
		address1,
		address2,
		city,
		state,
		zipcode,
		zipcode_4,
		voice_phone,
		emg_phone,
		fax_phone,
		email,
		url,
		notes,
		handicap_access_flag,
		special_needs_patient_flag,
		contact_name,
		office_type,
		county,
		text_phone,
		medicaid_id,
		medicare_id,
		other_id1,
		other_id2,
		npi,
		public_transportation_flag,
		latitude,
		longitude,
		services,
		hours ) ';

	$query .=  "VALUES ";	
	$c=0;
	foreach ($rows as $row) : 
		$c++;
		if ($c < count($rows)) {
			$query .= "('" . implode("','", $row) . "'),";
		} else {
			$query .= "('" . implode("','", $row) . "')";
		}	  
	endforeach;
		
	$result = $wpdb->query($wpdb->prepare($query)); 
	
	if ($result > 0 ) {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' processed ' . ($c-1) . ' records.' . PHP_EOL;
	} else {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' error processing' . PHP_EOL;
	}
	file_put_contents ($log_file, $log, FILE_APPEND);
	
}

function import_network ($zipfile, $file, $table, $batch, $log_file) {
	
	global $wpdb;
	date_default_timezone_set('America/New_York'); 
	
	$query = 'TRUNCATE TABLE '. $wpdb->prefix  . 'hvp_' . $table;
	$wpdb->query($wpdb->prepare($query));
	
	$csv = WP_CONTENT_DIR . '/uploads/imports/' . $batch . '/' . $file;
	
	if (($handle = fopen($csv,"r")) !== FALSE) :
		
		$c=0;
		$r=-1;
		$query = '';
		$row  = array();
		$rows = array();
		
		while (($data = fgetcsv($handle, 200000, ",")) !== FALSE) :
				
			$c++; if ($c==1) {continue;}
			$r++;
			
			$rows[$r]['id'] 	= addslashes($data[0]);			
			$rows[$r]['name']	= addslashes($data[1]);	
		
		endwhile;
		
		$rows = array_map("unserialize", array_unique(array_map("serialize", $rows)));
		
		fclose($handle);
	
	endif;
	
	$query .= 'INSERT INTO '. $wpdb->prefix  . 'hvp_' . $table .
	'( id, 
	name ) ';
	
	$query .=  "VALUES ";	
	$c=0;
	foreach ($rows as $row) : 
		$c++;
		if ($c < count($rows)) {
			$query .= "('" . implode("','", $row) . "'),";
		} else {
			$query .= "('" . implode("','", $row) . "')";
		}	  
	endforeach;
		
	$result = $wpdb->query($wpdb->prepare($query)); 
	
	if ($result > 0 ) {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' processed ' . ($c-1) . ' records.' . PHP_EOL;
	} else {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' error processing' . PHP_EOL;
	}
	file_put_contents ($log_file, $log, FILE_APPEND);
	
}

function import_participation ($zipfile, $file, $table, $batch, $log_file) {

	global $wpdb;
	date_default_timezone_set('America/New_York'); 
	
	$query = 'TRUNCATE TABLE '. $wpdb->prefix  . 'hvp_' . $table;
	$wpdb->query($wpdb->prepare($query));
	
	$csv = WP_CONTENT_DIR . '/uploads/imports/' . $batch . '/' . $file;
	
	if (($handle = fopen($csv,"r")) !== FALSE) :
		
		$c=0;
		$r=-1;
		$query = '';
		$row  = array();
		$rows = array();
		
		while (($data = fgetcsv($handle, 200000, ",")) !== FALSE) :
				
			$c++; if ($c==1) {continue;}
			$r++;
			
			$rows[$r]['provider'] 	= addslashes($data[0]);			
			$rows[$r]['location']	= addslashes($data[1]);			
			$rows[$r]['network']	= addslashes($data[2]);	
							
		endwhile;
		
		fclose($handle);
	
	endif;
	
	$query .= 'INSERT INTO '. $wpdb->prefix  . 'hvp_' . $table .
	'( provider,
	   location, 
	   network ) ';
	
	$query .=  "VALUES ";
	$c=0;	
	foreach ($rows as $row) : 
		$c++;
		if ($c < count($rows)) {
			$query .= "('" . implode("','", $row) . "'),";
		} else {
			$query .= "('" . implode("','", $row) . "')";
		}	  
	endforeach;
	
	$result = $wpdb->query($wpdb->prepare($query)); 
	
	if ($result > 0 ) {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' processed ' . ($c-1) . ' records.' . PHP_EOL;
	} else {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' error processing' . PHP_EOL;
	}
	file_put_contents ($log_file, $log, FILE_APPEND);
	
}

function import_provider ($zipfile, $file, $table, $batch, $log_file) {
	
	global $wpdb;
	date_default_timezone_set('America/New_York'); 
	
	$query = 'TRUNCATE TABLE '. $wpdb->prefix  . 'hvp_' . $table;
	$wpdb->query($wpdb->prepare($query));
	
	$csv = WP_CONTENT_DIR . '/uploads/imports/' . $batch . '/' . $file;
	
	if (($handle = fopen($csv,"r")) !== FALSE) :
				
		$c=0;
		$r=-1;
		$query = '';
		$row  = array();
		$rows = array();
		
		while (($data = fgetcsv($handle, 200000, ",")) !== FALSE) :
				
			$c++; if ($c==1) {continue;}
			$r++;
			
			$rows[$r]['id'] 						= addslashes($data[0]);			
			$rows[$r]['provider_first_name'] 		= addslashes($data[1]);			
			$rows[$r]['provider_middle_name'] 		= addslashes($data[2]);			
			$rows[$r]['provider_last_name'] 		= addslashes($data[3]);			
			$rows[$r]['npi'] 						= addslashes($data[4]);			
			$rows[$r]['provider_type_description'] 	= addslashes($data[5]);			
			$rows[$r]['degree'] 					= addslashes($data[6]);			
			$rows[$r]['type'] 						= addslashes($data[7]);			
			$rows[$r]['education'] 					= addslashes($data[8]);			
			$rows[$r]['dob'] 						= addslashes($data[9]);			
			$rows[$r]['gender'] 					= addslashes($data[10]);			
			$rows[$r]['home_phone']					= addslashes($data[11]);		
			$rows[$r]['email']						= addslashes($data[12]);		
			$rows[$r]['languages']					= addslashes($data[13]);
		
		endwhile;
		
		fclose($handle);
	
	endif;
	
	$query .= 'INSERT INTO '. $wpdb->prefix  . 'hvp_' . $table .
	 '( id,
		provider_first_name,
		provider_middle_name,
		provider_last_name,
		npi,
		provider_type_description,
		degree,
		type,
		education,
		dob,
		gender,
		home_phone,
		email,
		languages ) ';
					
	$query .=  "VALUES ";	
	$c=0;
	foreach ($rows as $row) : 
		$c++;
		if ($c < count($rows)) {
			$query .= "('" . implode("','", $row) . "'),";
		} else {
			$query .= "('" . implode("','", $row) . "')";
		}	  
	endforeach;
	
	$result = $wpdb->query($wpdb->prepare($query)); 
	
	if ($result > 0 ) {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' processed ' . ($c-1) . ' records.' . PHP_EOL;
	} else {
		$log = date("Y-m-d h:i:sa") . ' ' . $file . ' error processing' . PHP_EOL;
	}
	file_put_contents ($log_file, $log, FILE_APPEND);
	
}

// address->lat,long
function address_to_latlong ($address) {

	$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key=AIzaSyCQbHvpVKjrk5YF0nruF2MG3FcSxWZ4_Uk';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
	$responseJson = curl_exec($ch);
	curl_close($ch);
	
	$response = json_decode($responseJson);
	
	if ($response->status == 'OK') {
		$latlong = array();
		$latlong['latitude']  = $response->results[0]->geometry->location->lat;
		$latlong['longitude'] = $response->results[0]->geometry->location->lng;
	} 
	
	return $latlong;
	
}

function display_search_form () {
	
	global $wpdb;
	$html = "";
	$html .= '<form id="provider-search">';
		$html .= '<div class="form-container">';
			$html .= '<div class="plan-container">';
				$html .= '<select name="plan" id="plan" required>';
					$html .= '<option value="" disabled selected>Select your Network</option>';
					$query = 'SELECT * FROM ' . $wpdb->prefix  . 'hvp_network';
					$networks = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);	
					foreach ($networks as $network) {
						if ($_SESSION['plan'] == $network['id']) {
							$html .= '<option value="' . $network['id'] . '" selected><span class="black">' . $network['name'] . '</span></option>';
						} else { 
							$html .= '<option value="' . $network['id'] . '">' . $network['name'] . '</option>';
						}
					}
					if (have_rows('provider_additional_plans','option')) :
						$option_count = 0;
						while (have_rows('provider_additional_plans','option') ) : the_row();
							$option_count++;
							$html .= '<option value="option-' . $option_count . '">' . get_sub_field('name') . '</option>';
						endwhile;
					endif;
				$html .= '</select>';
			$html .= '</div>';
			$html .= '<script type="text/javascript">';
				$html .= 'jQuery(document).ready(function($){';
					$html .= '$("select[name=plan]").on("change", function(e) {';
						$html .= 'var selection = this.value;';
						$html .= 'var values = [];';
						$html .= 'values = selection.split("-",2);';
						$html .= 'if (values[0] === "option") {';
							$html .= 'var data = {';
								$html .= '"message_number"   : values[1],';
								$html .= '"action" : "display_plan_message",';
							$html .= '};';
							$html .= '$.post("' . admin_url('admin-ajax.php') .'", data, function(results){';
								$html .= '$("#dialog").html(results);';
								$html .= '$("#dialog").dialog();';
							$html .= '});';	
						$html .= '}';
					$html .= '});';
				$html .= '});';
			$html .= '</script>';
			$html .= '<div id="dialog"></div>';
			$html .= '<div class="submit-container">';
				$html .= '<input type="submit" name="submit" id="submit" value="SEARCH">';
			$html .= '</div>';
			
			$html .= '<div class="zipcode-container">';
				$html .= '<div class="zipcode-inner-container">';				
					if (isset($_SESSION['zipcode'])) {
						$html .= '<div class="located"><input type="text" name="zipcode" id="zipcode" class="text-group" value="' . $_SESSION['zipcode'] . '" placeholder="Search by Zipcode"></div>';
					} else {
						$html .= '<div class="input"><input type="text" name="zipcode" id="zipcode" class="text-group" placeholder="Search by Zipcode"></div>';
						$html .= '<div class="location">or <a href="#" name="location" id="location"><i class="fas fa-location"></i><span>Use My Location</span></a></div>';
							$html .= '<script type="text/javascript">';
								$html .= 'jQuery(document).ready(function($){';
									$html .= '$("#location").click(function(){';
										$html .= 'event.preventDefault();';
										$html .= 'var data = {';
											$html .= '"action" : "provider_search_address_from_ip"';
										$html .= '};';
										$html .= '$.post("' . admin_url('admin-ajax.php') .'", data, function(results){';
											$html .= 'location.reload(true)';
										$html .= '});';	
									$html .= '});';
								$html .= '});';
							$html .= '</script>';
					}
				$html .= '</div>';
			$html .= '</div>';
				
			$html .= '<div class="radius-container">';
				$html .= '<select name="radius" id="radius" required>';
					if (!isset($_SESSION['radius'])) {
						$html .= '<option value="5">5 Miles</option>';
						$html .= '<option value="10" selected>10 Miles</option>';
						$html .= '<option value="15">15 Miles</option>';
						$html .= '<option value="25">25 Miles</option>';
						$html .= '<option value="50">50 Miles</option>';
						// $html .= '<option value="75">75 Miles</option>';
					} else {
						switch ($_SESSION['radius']) {
							case "5":
								$html .= '<option value="5" selected>5 Miles</option>';
								$html .= '<option value="10">10 Miles</option>';
								$html .= '<option value="15">15 Miles</option>';
								$html .= '<option value="25">25 Miles</option>';
								$html .= '<option value="50">50 Miles</option>';
								// $html .= '<option value="75">75 Miles</option>';
								break;
							case "10":
								$html .= '<option value="5">5 Miles</option>';
								$html .= '<option value="10" selected>10 Miles</option>';
								$html .= '<option value="15">15 Miles</option>';
								$html .= '<option value="25">25 Miles</option>';
								$html .= '<option value="50">50 Miles</option>';
								// $html .= '<option value="75">75 Miles</option>';
								break;
							case "15":
								$html .= '<option value="5">5 Miles</option>';
								$html .= '<option value="10">10 Miles</option>';
								$html .= '<option value="15" selected>15 Miles</option>';
								$html .= '<option value="25">25 Miles</option>';
								$html .= '<option value="50">50 Miles</option>';
								// $html .= '<option value="75">75 Miles</option>';
								break;
							case "25":
								$html .= '<option value="5">5 Miles</option>';
								$html .= '<option value="10">10 Miles</option>';
								$html .= '<option value="15">15 Miles</option>';
								$html .= '<option value="25" selected>25 Miles</option>';
								$html .= '<option value="50">50 Miles</option>';
								// $html .= '<option value="75">75 Miles</option>';
								break;
							case "50":
								$html .= '<option value="5">5 Miles</option>';
								$html .= '<option value="10">10 Miles</option>';
								$html .= '<option value="15">15 Miles</option>';
								$html .= '<option value="25">25 Miles</option>';
								$html .= '<option value="50" selected>50 Miles</option>';
								// $html .= '<option value="75">75 Miles</option>';
								break;
							case "75":
								$html .= '<option value="5">5 Miles</option>';
								$html .= '<option value="10">10 Miles</option>';
								$html .= '<option value="15">15 Miles</option>';
								$html .= '<option value="25">25 Miles</option>';
								$html .= '<option value="50">50 Miles</option>';
								$html .= '<option value="75" selected>75 Miles</option>';
								break;
						}
					}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="advanced-container">';
			$html .= '<div class="heading"><a id="advanced-search">Advanced Search</a></div>';
				if ((isset($_SESSION['provider'])) || (isset($_SESSION['gender'])) || (isset($_SESSION['type']))) :
					$html .= '<div id="advanced-search-elements" class="advanced">';
				else :
					$html .= '<div id="advanced-search-elements" class="advanced" style="display:none;">';
				endif; 
					$html .= '<div class="provider-container">';
						if (isset($_SESSION['provider'])) { 
							$html .= '<input class="text-group" type="text" name="provider" id="provider" placeholder="' . $_SESSION['provider'] . '" value="' . stripslashes($_SESSION['provider']) . '">';
						} else { 
							$html .= '<input class="text-group" type="text" name="provider" id="provider" placeholder="Search by Provider">';
						}
					$html .= '</div>';
					$html .= '<div class="gender-container">';
						$html .= '<select name="gender" id="gender" required>';
							$html .= '<option value="" disabled selected>Gender</option>';
							if (!isset($_SESSION['gender'])) {
								$html .= '<option value="F">Female</option>';
								$html .= '<option value="M">Male</option>';
							} else {
								switch ($_SESSION['gender']) {
									case "F":
										$html .= '<option value="F" selected>Female</option>';
										$html .= '<option value="M">Male</option>';
										break;
									case "M":
										$html .= '<option value="F">Female</option>';
										$html .= '<option value="M" selected>Male</option>';
										break;
								}
							}
						$html .= '</select>';
					$html .= '</div>';
					$html .= '<div class="type-container">';
						$html .= '<select name="type" id="type" required>';
							$html .= '<option value="" disabled selected>Type of Doctor</option>';
							$query = 'SELECT * FROM ' . $wpdb->prefix  . 'hvp_network';
							$query = 'SELECT DISTINCT type FROM ' . $wpdb->prefix  . 'hvp_provider WHERE type != "";';
							$types = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);	
							foreach ($types as $type) {
								if ($_SESSION['type'] == $type['type']) {
									$html .= '<option value="' . $type['type'] . '" selected>' . $type['type'] . '</option>';
								} else { 
									$html .= '<option value="' . $type['type'] . '">' . $type['type'] . '</option>';
								}
							}
						$html .= '</select>';
					$html .= '</div>';
					$html .= '<div class="reset-container">';
						$html .= '<input type="submit" name="reset" id="reset" value="RESET">';
					$html .= '</div>';
					$html .= '<script type="text/javascript">';
						$html .= 'jQuery(document).ready(function($){';
							$html .= '$("#reset").click(function(){';
								$html .= 'event.preventDefault();';
								$html .= '$("#provider-search").trigger("reset");';
								$html .= 'var data = {';
									$html .= '"action" : "provider_search_form_reset"';
								$html .= '};';
								$html .= '$.post("' . admin_url('admin-ajax.php') .'", data, function(results){';
									$html .= 'location.reload(true)';
								$html .= '});';	
							$html .= '});';
						$html .= '});';
					$html .= '</script>';
			$html .= '</div>';
		$html .= '</div>';
	$html .= '</form>';
		
	$html .= '<script type="text/javascript">';
		$html .= 'jQuery(document).ready(function($){';
			$html .= '$("#advanced-search").click(function(){';
		  		$html .= '$("#advanced-search-elements").toggle();';
			$html .= '});';
		$html .= '});';
	$html .= '</script>';	
		
	$html .= '<script type="text/javascript">';
		$html .= 'jQuery(document).ready(function($){';
			$html .= '$("#provider-search").validate({';
				$html .= 'rules: {';
					$html .= 'plan: {';
						$html .= 'required: true,';
					$html .= '},';
					$html .= 'zipcode: {';
						$html .= 'zipcodeUS: true';
					$html .= '},';
					$html .= 'radius: {';
						$html .= 'required: false';
					$html .= '},';
					$html .= 'gender: {';
						$html .= 'required: false';
					$html .= '},';
					$html .= 'type: {';
						$html .= 'required: false';
					$html .= '}';
				$html .= '},';
				$html .= 'messages: {';
					$html .= 'plan: {';
						$html .= 'required: "Please select a Network.",';
					$html .= '},';
					$html .= 'zipcode: {';
						$html .= 'zipcodeUS: "Please enter a valid 5-digit zipcode."';
					$html .= '}';
				$html .= '},';
				$html .= 'showErrors: function (errorMap, errorList) {';
					$html .= 'var msg = "";';
					$html .= '$.each(errorMap, function(key, value) {';
						$html .= 'msg += value + "<br/>";';
					$html .= '});';
					$html .= '$("#errormessages").html(msg);';
					$html .= 'this.defaultShowErrors();'; 
					$html .= 'if (this.numberOfInvalids() > 0) {';
						$html .= '$("#errormessages").show();';
					$html .= '} else {';
						$html .= '$("#errormessages").hide();';
					$html .= '}';
				$html .= '},';
				$html .= 'submitHandler: function(form) {';
					$html .= 'var plan 		= $("#plan").val();';
					$html .= 'var zipcode 	= $("#zipcode").val();';
					$html .= 'var radius 	= $("#radius").val();';
					$html .= 'var provider 	= $("#provider").val();';
					$html .= 'var gender 	= $("#gender").val();';
					$html .= 'var type 		= $("#type").val();';
					$html .= 'var data = {';
						$html .= '"action" 		: "provider_search_form",';
						$html .= '"plan" 		: plan,';
						$html .= '"zipcode" 	: zipcode,';
						$html .= '"radius" 		: radius,';
						$html .= '"provider" 	: provider,';
						$html .= '"gender" 		: gender,';
						$html .= '"type" 		: type';
					$html .= '};';
					$html .= '$.post("' . admin_url('admin-ajax.php') .'", data, function(results){';
						$html .= 'window.location.href = "' . site_url() . '/provider-search-results/"';
					$html .= '});';	
					$html .= 'return false;';
				$html .= '}';
			$html .= '});';
		$html .= '});';
	$html .= '</script>';
	
	return $html;
	
}

add_action("wp_ajax_provider_search_address_from_ip", "provider_search_address_from_ip");
add_action("wp_ajax_nopriv_provider_search_address_from_ip", "provider_search_address_from_ip");

function display_plan_message() {
	$message_number = $_POST['message_number'];
	if (have_rows('provider_additional_plans','option')) :
		$option_count = 0;
		while (have_rows('provider_additional_plans','option') ) : the_row();
			$option_count++;
			if ($option_count == $message_number) :
				$result = get_sub_field('message');
			endif;
		endwhile;
	endif;	
	echo $result;	
	die();
}
add_action("wp_ajax_display_plan_message", "display_plan_message");
add_action("wp_ajax_nopriv_display_plan_message", "display_plan_message");

function provider_search_address_from_ip(){
	unset($_SESSION['zipcode']);
	$use_my_location 		= 'https://www.iplocate.io/api/lookup/' . $_SERVER['REMOTE_ADDR'];
	$location_json 			= file_get_contents($use_my_location);
	$location_json_decoded 	= json_decode($location_json, true);
	$use_my_location_zip	= 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyCQbHvpVKjrk5YF0nruF2MG3FcSxWZ4_Uk&latlng=' . $location_json_decoded['latitude'] . ',' . $location_json_decoded['longitude'];
	$geocode 				= file_get_contents($use_my_location_zip);
	$geocode_json 			= json_decode($geocode,true);
	$formattedAddress 		= isset($geocode_json['results'][0]['formatted_address']) ? $geocode_json['results'][0]['formatted_address'] : "";  
	$_SESSION['zipcode'] 	=  extract_zipcode($formattedAddress, 1);	
}	

add_action("wp_ajax_provider_search_form_reset", "provider_search_form_reset");
add_action("wp_ajax_nopriv_provider_search_form_reset", "provider_search_form_reset");

function provider_search_form_reset(){
	unset($_SESSION['results']);
	unset($_SESSION['radius']);
	unset($_SESSION['zipcode']);
	unset($_SESSION['plan']);
	unset($_SESSION['provider']);
	unset($_SESSION['gender']);
	unset($_SESSION['type']);
}	

add_action("wp_ajax_provider_search_form", "provider_search_form");
add_action("wp_ajax_nopriv_provider_search_form", "provider_search_form");

function provider_search_form(){
	
	global $wpdb;
	
	unset($_SESSION['results']);
	unset($_SESSION['radius']);
	unset($_SESSION['zipcode']);
	unset($_SESSION['plan']);
	unset($_SESSION['provider']);
	unset($_SESSION['gender']);
	unset($_SESSION['type']);

	$plan 		= trim(htmlentities(strip_tags($_POST['plan'])));
	$zipcode	= trim(htmlentities(strip_tags($_POST['zipcode'])));
	$radius		= $_POST['radius'];
	$provider	= trim(htmlentities(strip_tags($_POST['provider'])));
	$gender		= $_POST['gender'];
	$type		= $_POST['type'];
	
	$_SESSION['plan'] = $plan;
	
	$zipcodes_in_radius = array();
	if ((!empty($zipcode)) && (!empty($radius)))  { 
		$url  = 'https://app.zipcodebase.com/api/v1/radius?apikey=38ef9c00-0db4-11ed-b9d2-b1152f59ea3f&country=us&unit=miles&code=' . $zipcode . '&radius=50';		
		$json = file_get_contents($url);
		$data = json_decode($json, true);
		$i=-1;
		foreach ($data['results'] as $result) {
			$i++;
			if (round($result['distance']) <= $radius) :
				$zipcodes_in_radius[$i]['zipcode'] 			= $result['code'];
				$zipcodes_in_radius[$i]['distance'] 		= round($result['distance']);
			endif;
		}
		$_SESSION['radius'] 		= $radius;
		$_SESSION['zipcode_search'] = $zipcode;
	}
	if ($zipcodes_in_radius) { $_SESSION['zipcodes_in_radius'] = $zipcodes_in_radius; }

	
	$search_query = 'SELECT DISTINCT ' .
						'@rownum := @rownum + 1 as ID, ' .
						'L.id as location_id, ' .
						'D.id as provider_id, ' . 
						'L.name, ' .
						'L.voice_phone, ' .
						'L.address1, ' .
						'L.address2, ' .
						'L.city, ' .
						'L.state, ' .
						'L.zipcode, ' .
						'L.services,  ' .
						'L.hours,  ' .
						'L.latitude,  ' .
						'L.longitude, ' .
						'N.name as plan, ' .
						'D.provider_first_name, ' .
						'D.provider_middle_name, ' .
						'D.provider_last_name, ' .
						'D.gender, ' .
						'D.npi, ' .
						'D.degree ' .
					'FROM wp_hvp_provider D  ' .
						'CROSS JOIN (SELECT @rownum := 0) r ' . 
						'JOIN wp_hvp_participation P ON P.network = ' . $plan . ' AND D.id = P.provider ' .
						'JOIN wp_hvp_location L ON P.network = ' . $plan . ' AND L.id = P.location ' .
						'JOIN wp_hvp_network N ON N.id = ' . $plan .  ' ' .
					'WHERE D.provider_first_name IS NOT NULL ';
	$field_query = '';	

	if (strlen($zipcode) > 0) :
		if (!empty($zipcodes_in_radius)) {
			$field_query .= 'AND ((L.zipcode = ' . $zipcode . ') ';
			foreach ($zipcodes_in_radius as $z) {		
				$field_query .= 'OR (L.zipcode = ' . $z['zipcode'] . ') ';
			}
			$field_query .= ') ';
		} else {		
			$field_query .= 'AND (L.zipcode = ' . $zipcode . ') ';
		}
		$_SESSION['zipcode'] = $zipcode;
	endif;			
	if (strlen($provider) > 0) {
		$field_query .= 'AND (LOWER(L.name) LIKE "%' . strtolower($provider) . '%") ';
		$_SESSION['provider'] = $provider;
	}			
	if (strlen($gender) > 0) {
		$field_query .= 'AND (D.gender = "' . $gender . '") ';
		$_SESSION['gender'] = $gender;
	}			
	if (strlen($type) > 0) {
		$field_query .= 'AND (D.type = "' . $type . '") ';
		$_SESSION['type'] = $type;
	}
	
	$search_query .= $search_results . $field_query . ' ORDER BY L.zipcode, L.name';

$_SESSION['debug'] = $search_query;
	
	$results = $wpdb->get_results($search_query, ARRAY_A);
	$_SESSION['results'] = $results;

}
function get_search_results ($results) {
	
	global $wpdb;
	
	$search_results = array();
	$sr=-1;

	foreach ($results as $result) :
		
		$sr++;
		
		$search_results[$sr]['location_id']	= $result['location_id'];
		$search_results[$sr]['name']		= addslashes($result['name']);
		$search_results[$sr]['voice_phone'] = $result['voice_phone'];
		
		$address		 = '';
		$address 		.= ucwords(strtolower($result['address1'])) . '<br>';
		if (strlen($result['address2']) > 0)	{ $address 	.= ucwords(strtolower($result['address2'])) . '<br>'; }
		$address 		.= ucwords(strtolower($result['city'])) . ', ';
		$address 		.= $result['state'] . ', ';
		if (strlen($result['zipcode']) == 4) :
			$zipcode  = '0' . $result['zipcode'];
		else: 
			$zipcode  = $result['zipcode'];
		endif;
		$address .= $zipcode;
		
		if ($_SESSION['zipcodes_in_radius']) :
			if ($result['zipcode'] == $_SESSION['zipcode_search']) :
				$address .= '<div class="distance">' . '(0 miles from Zipcode ' . $_SESSION['zipcode_search'] . ')' . '</div>';
			else :
				foreach ($_SESSION['zipcodes_in_radius'] as $z) :
					if ($z['zipcode'] === $zipcode) :
						$search_results[$sr]['distance'] = $z['distance'];
						$address .= '<div class="distance">' . '(' . $z['distance'] . ' miles from Zipcode ' . $_SESSION['zipcode_search'] . ')' . '</div>';
					endif;
				endforeach;
			endif;
		else :
			$address .= '<div class="distance">' . '(0 miles from Zipcode ' . $_SESSION['zipcode_search'] . ')' . '</div>';
		endif;
		$search_results[$sr]['address'] = addslashes($address);
		
		$directions_address  = '';
		$directions_address .= $result['address1'];
		$directions_address .= ' ' . $result['city'];
		$directions_address .= ' ' . $result['state'];
		$directions_address .= ' ' . $result['zipcode'];
		$directions = '<a href="https://www.google.com/maps/dir/' . addslashes($directions_address) .'" target="_blank">GET DIRECTIONS<i class="fal fa-angle-right"></i></a><br>';
		$search_results[$sr]['directions_address'] 		= $directions_address;
		$search_results[$sr]['directions'] 				= $directions;
		$search_results[$sr]['latitude'] 				= $result['latitude'];
		$search_results[$sr]['longitude'] 				= $result['longitude'];
		$search_results[$sr]['services'] 				= str_replace(array( '(', ')' ), '', $result['services']);
		
		$hours = array();
		$hours_display = array();
		$days = array();
		$d = str_replace("(","",$result['hours']);
		$d = str_replace(")","",$d);
		$days = explode(',', $d);
		foreach ($days as $day) :		
			$d = str_replace("[","",$day);
			$d = str_replace("]","",$d);	
			$hours[] = explode('|', $d);
		endforeach;
		$i=-1;
		foreach ($hours as $hour) :
			if (($hour[0] == '00:00AM') && ($hour[1] == '00:00AM') && ($hour[2] == '00:00PM') && ($hour[3] == '00:00PM')) { continue; }
			$i++;
			switch ($i) {
			case 0:
				$h = '<div class="name">Mon</div>';
				break;
			case 1:
				$h = '<div class="name">Tue</div>';
				break;
			case 2:
				$h = '<div class="name">Wed</div>';
				break;
			case 3:
				$h = '<div class="name">Thu</div>';
				break;
			case 4:
				$h = '<div class="name">Fri</div>';
				break;
			case 5:
				$h = '<div class="name">Sat</div>';
				break;
			case 6:
				$h = '<div class="name">Sun</div>';
				break;
			}
			$h .= '<div class="time">';
			$h .= $hour[0];
			if ($hour[1] != '00:00AM') { $h .= '-' . $hour[1]; }
			if ($hour[2] != '00:00PM') { $h .= ', ' . $hour[2]; }
			$h .= '-' . $hour[3];
			$h .= '</div>';
			$hours_display[] = $h;
		endforeach;
		if (!empty($hours_display)) : 
			$i=0;
			$display = '';
			foreach ($hours_display as $hour_display) :
				$i++;
				if ($i == 1) { $display .= '<div class="weekdays">'; }
				if ($i == 6) { $display .= '<div class="weekends">'; }
					$display .= '<div class="day">';
						$display .= ' ' . $hour_display;
					$display .= '</div>'; 
				if ($i == 5) { $display .= '</div>'; }
				if ($i == 7) { $display .= '</div>'; }
			endforeach;
			$search_results[$sr]['hours'] = $display;
		endif;
		
		$plans = array();
		$network_query   =  'SELECT DISTINCT ' . 
							'N.name ' . 
							'FROM wp_hvp_participation P ' .
							'JOIN wp_hvp_network N ON N.id = P.network ' .
							'WHERE P.location = ' . $result['location_id'] . ' AND P.provider = ' . $result['provider_id'];
		$network_results = $wpdb->get_results($network_query, ARRAY_A);
		foreach ($network_results as $network_result) {
			$plans[] = $network_result['name'];
		}	
		$plans = array_unique($plans);
		$search_results[$sr]['plans'] = $plans; 
	
		$providers = array();
		$c++;
		foreach ($results as $provider_result) {
						
			$c++;
			if ($provider_result['location_id'] == $result['location_id']) {
				if ($provider_result['provider_first_name'][0] != '-') {
					$providers[$c]['provider_first_name']  = ucwords(strtolower($provider_result['provider_first_name']));
					$providers[$c]['provider_middle_name'] = ucwords(strtolower($provider_result['provider_middle_name']));
					$providers[$c]['provider_last_name']   = ucwords(strtolower($provider_result['provider_last_name']));
					$providers[$c]['provider_name']	= $providers[$c]['provider_first_name'] . ' ';
					if (strlen($providers[$c]['provider_middle_name']) > 0) { $providers[$c]['provider_name'] .= $providers[$c]['provider_middle_name'] . ' '; }
					$providers[$c]['provider_name'] .= $providers[$c]['provider_last_name'];
					if (strlen($provider_result['degree']) > 0) { $providers[$c]['provider_name'] .= ', ' . $provider_result['degree']; }
					$providers[$c]['npi'] = $provider_result['npi'];
					if ($provider_result['gender'] == 'M') { $providers[$c]['gender'] = 'Male'; }
					if ($provider_result['gender'] == 'F') { $providers[$c]['gender'] = 'Female'; }
					$license_query = 'SELECT license_no ' . 
							 		'FROM wp_hvp_license ' . 
							 		'WHERE (description = "STATE LICENSE NUMBER") ' .
						 	 		'AND (provider = ' . $result['provider_id'] . ')';
					$license_results = $wpdb->get_results($license_query, ARRAY_A);
					foreach ($license_results as $license_result) {
						$providers[$c]['license_no'] = $license_result['license_no'];
					}
				}
			}
		}	
		
		usort($providers, function($a, $b) {
			return $a['provider_last_name'] <=> $b['provider_last_name'];
		});
		$provider_count=0;
		foreach ($providers as $provider) { 
			$provider_count++;
		}
		$search_results[$sr]['provider_count']	= $provider_count; 
		$search_results[$sr]['providers']		= $providers; 	
		
	endforeach;
	
	$search_results = array_intersect_key($search_results, array_unique(array_column($search_results, 'location_id')));
	
	if ($_SESSION['zipcodes_in_radius']) :
		usort($search_results, function($a, $b) {
			return $a['distance'] <=> $b['distance'];
		});
	endif;
	
	return $search_results;

}

/**
 * Convert curly/smart quotes to regular quotes
 *
 * This function will convert Windows-1252, CP-1252, and other UTF-8 single and double quotes to regular quotes,
 * otherwise known as Unicode character U+0022 quotion mark (") and U+0027 apostrophe (') which typically do not have
 * any sort of encoding issues that the others run into.
 *
 * @param string $text The text that contains curly quotes
 * @return string Normalized text using regular quotes
 */
function convertCurlyQuotes($text): string
{
	$quoteMapping = [
		// U+0082⇒U+201A single low-9 quotation mark
		"\xC2\x82"     => "'",

		// U+0084⇒U+201E double low-9 quotation mark
		"\xC2\x84"     => '"',

		// U+008B⇒U+2039 single left-pointing angle quotation mark
		"\xC2\x8B"     => "'",

		// U+0091⇒U+2018 left single quotation mark
		"\xC2\x91"     => "'",

		// U+0092⇒U+2019 right single quotation mark
		"\xC2\x92"     => "'",

		// U+0093⇒U+201C left double quotation mark
		"\xC2\x93"     => '"',

		// U+0094⇒U+201D right double quotation mark
		"\xC2\x94"     => '"',

		// U+009B⇒U+203A single right-pointing angle quotation mark
		"\xC2\x9B"     => "'",

		// U+00AB left-pointing double angle quotation mark
		"\xC2\xAB"     => '"',

		// U+00BB right-pointing double angle quotation mark
		"\xC2\xBB"     => '"',

		// U+2018 left single quotation mark
		"\xE2\x80\x98" => "'",

		// U+2019 right single quotation mark
		"\xE2\x80\x99" => "'",

		// U+201A single low-9 quotation mark
		"\xE2\x80\x9A" => "'",

		// U+201B single high-reversed-9 quotation mark
		"\xE2\x80\x9B" => "'",

		// U+201C left double quotation mark
		"\xE2\x80\x9C" => '"',

		// U+201D right double quotation mark
		"\xE2\x80\x9D" => '"',

		// U+201E double low-9 quotation mark
		"\xE2\x80\x9E" => '"',

		// U+201F double high-reversed-9 quotation mark
		"\xE2\x80\x9F" => '"',

		// U+2039 single left-pointing angle quotation mark
		"\xE2\x80\xB9" => "'",

		// U+203A single right-pointing angle quotation mark
		"\xE2\x80\xBA" => "'",

		// HTML left double quote
		"&ldquo;"      => '"',

		// HTML right double quote
		"&rdquo;"      => '"',

		// HTML left sinqle quote
		"&lsquo;"      => "'",

		// HTML right single quote
		"&rsquo;"      => "'",
	];

	return strtr(html_entity_decode($text, ENT_QUOTES, "UTF-8"), $quoteMapping);
}

?>