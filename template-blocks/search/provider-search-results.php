<?php

global $wpdb;

$block_name = "provider_search_results";
$id = $block_name . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = $block_name;
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

?>

<style>
	#<?php echo esc_attr($id); ?>  {
		background:url("<?php echo wp_get_attachment_url(get_field('background_image')); ?>") center center no-repeat;
		background-size:cover
	}
	@media screen and (max-width: 800px) {
		#<?php echo esc_attr($id); ?>  { 
			background:url("<?php echo wp_get_attachment_url(get_field('background_image_mobile')); ?>") center center no-repeat;
			background-size:cover
		}
	}
</style>
<section id="<?php echo esc_attr($id); ?>" class="background <?php echo esc_attr($className); ?>">
</section>

<?php 
// echo 'HELLO';
// echo '<pre>'; print_r($_SESSION['debug']);echo '</pre>'; 
// echo $_SESSION['debug'];
?>

<?php
if (isset($_SESSION['results'])) :
	$results = get_search_results($_SESSION['results']);	
	
// echo '<pre>';print_r($results);echo '</pre>';
	
	
	$mapdata = array();
	$c=-1;
	foreach ($results as $result) :
		$c++;
		$mapdata[$c]['latitude'] 	= $result['latitude'];
		$mapdata[$c]['longitude'] 	= $result['longitude'];
		$mapdata[$c]['infowindow']  = 
				'<div class="infowindow">' . 
					'<div class="infowindow-container">' . 
						'<a href="#provider-' . ($c+1) . '">' . 
							'<div class="name">' . $result['name'] . '</div>' .
						'</a>' . 
						'<div class="address">' . $result['address'] . '</div>' .
						'<div class="directions">' . $result['directions'] . '</div>' .
						'<div class="learn-more">' . 
							'<a href="#provider-' . ($c+1) . '">' . 
							 	'LEARN MORE >' . 
							'</a>' . 
						'</div>' .
					'</div>' .
				'</div>';
	endforeach;
	
// echo '<pre>';print_r($mapdata);echo '</pre>';	
	
?>	
	<script>
		jQuery(document).ready(function($){
			const icon = "<?php echo get_template_directory_uri(); ?>/images/map-marker.png";
			const center = { lat: <?php echo $mapdata[0]['latitude']; ?>, lng: <?php echo $mapdata[0]['longitude']; ?> };
			const map = new google.maps.Map(document.getElementById("map"), {
				<?php
					if (count($results) > 300) { echo 'zoom: 4,'; }
					if ((count($results) > 250) && (count($results) <= 300)) { echo 'zoom: 5,'; }
					if ((count($results) > 200) && (count($results) <= 250)) { echo 'zoom: 5,'; }
					if ((count($results) > 150) && (count($results) <= 200)) { echo 'zoom: 5,'; }
					if ((count($results) > 100) && (count($results) <= 150)) { echo 'zoom: 5,'; }
					if ((count($results) > 10)  && (count($results) <= 100)) { echo 'zoom: 5,'; }
					if (count($results) < 10)  { echo 'zoom: 10,'; }
				?>
				center: center,
				zoomControl: false,
				streetViewControl: false
			});
			<?php 
				$p=0;
				foreach ($mapdata as $data) :
					$p++;
		
					echo 'var position' . $p . '= { lat: '. $data['latitude'] .', lng: ' . $data['longitude'] . '};';
		
					echo 'var contentString' . $p . ' = ' . "'" . $data['infowindow'] . "';"; 
					echo 'const infowindow' . $p . '= new google.maps.InfoWindow({';
						echo 'content: contentString' . $p;
					echo '});';
		
					echo 'const marker' . $p . '= new google.maps.Marker({';
						echo 'position: position' . $p . ',';
						echo 'icon: icon,';
						echo 'title: "' . 'title' . '",';
						echo 'map: map';
					echo '});';
					
					echo 'marker' . $p .'.addListener("click", () => {';
						echo 'infowindow' . $p . '.open({';
						echo 'anchor: marker' . $p . ',';
						echo 'map,';
							echo 'shouldFocus: false,';
						echo '});';
					echo '});';
					  
				endforeach; 
			?>
		});
	</script>
	
<?php endif; ?>

<?php if (isset($_SESSION['results'])) : ?> 
	<section class="map_results">
		<div class="wrapper">
			<div class="map-container">
				<div id="map"></div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="search-form">
	<div class="wrapper">
		<div class="content">
			<div class="content1">
				<div class="content1-container">
					<div class="row">				
						<div class="column1">
							<div id="errormessages"></div>
							<?php echo display_search_form(); ?>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="search_results">
	
	<div class="wrapper">
		<div class="content">
			<div class="content-container">
					<?php
						if (isset($_SESSION['results'])) :
							$results = get_search_results($_SESSION['results']);
					?>
							<div class="found-container">
								<?php if (count($results) > 0) : ?>
										<?php if (count($results) == 1 ) { ?>
											<div class="heading"><?php echo count($results); ?> Provider found</div>
										<?php } else { ?>
											<div class="heading"><?php echo count($results); ?> Providers found</div>
										<?php } ?>
										<div class="subheading">Some providers listed in the provider directory may not participate in your company’s plan.</div>
								<?php else : ?>
									<div class="heading">No providers found. Expand your search radius or <a href="<?php echo site_url(); ?>/contact/">contact us</a> here for assistance.</div>
								<?php endif; ?>
							</div>	
					<?php
							$count=0;
							foreach ($results as $result) :	
								$count++;	
					?>
								<div id="<?php echo 'provider-' . $count;?>" class="row">
									<div class="location-outer-container location-outer-container-<?php echo $count; ?>">
										<?php
											$link = array();
											$brand_logo = '';
											$name_found = FALSE;
											while (have_rows('brands','option')) : 
												the_row();
												if (get_sub_field('name') == "Generic") {
													$brand_logo = get_sub_field('logo');
													$link = get_sub_field('link');
												}
												$option_name = convertCurlyQuotes(stripslashes(get_sub_field('name')));
												$result_name = convertCurlyQuotes(stripslashes($result['name']));
												if (strlen($result_name) > 49) : 
													$result_name = substr($result_name,0,49);  
													$option_name = substr($option_name,0,49); 
												endif;
												
												if ($result_name == $option_name) :
													$name_found = TRUE;
													$brand_logo = get_sub_field('logo');
													$link  = get_sub_field('link');
												endif;
												
											endwhile;
											if($link): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											 endif;
											 $brand_link = '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
											?>
										<?php if (strlen($brand_logo) > 1) : ?>
											<style>
												.location-outer-container-<?php echo $count; ?> { 
													display: grid;
													grid-template-columns: 1fr 3fr; 
												}
											</style>
											<div class="logo-container">
												<div class="logo"><img src="<?php echo $brand_logo; ?>"></div>
											</div>
										<?php else: ?>
											<style>
												.location-outer-container-<?php echo $count; ?> { 
													display: grid;
													grid-template-columns: 1fr; 
												}
											</style>
										<?php endif; ?>
										<div class="location-inner-container">
											<div class="title-container">
												<div class="title"><?php echo stripslashes($result['name']); ?></div>
											</div>
											<div class="location-row">
												<div class="column">
													<div class="contact-container">
														<div class="link"><i class="far fa-phone"></i><a href="tel:<?php echo $result['voice_phone']; ?>"><?php echo $result['voice_phone']; ?></a></div>
														<?php if ($link) { echo '<div class="link"><i class="far fa-globe"></i>'  . $brand_link . '</div>'; } ?>
														<div class="address-container">
															<div class="marker"><i class="far fa-map-marker-alt"></i></div>
															<div class="address"><?php echo stripslashes($result['address']); ?></div>
														</div>
													</div>
													<div class="directions-container">
														<div class="directions"><?php echo stripslashes($result['directions']); ?></div>
													</div>
													<?php if ($result['languages']) : ?>
														<div class="languages-container">
															<div class="languages">
																<span class="heading">Languages: </span>
															</div>
														</div>
													<?php endif; ?>
												</div>
												<div class="column">
													<?php if ($result['hours']) : ?>
														<div class="hours">(HOURS)</div>
														<div class="hours-container"><?php echo $result['hours']; ?></div>
													<?php endif; ?>
													<div class="plans-container">
														<div class="plans">
															<span class="heading">Network Participation: </span>
															<?php
																$c=0;
																foreach ($result['plans'] as $plan) {
																	$c++;
																	if (count($result['plans']) != $c) {
																		echo '<span class="value">' . $plan . ', ' . '</span>';
																	} else {
																		echo '<span class="value">' . $plan . '</span>';
																	}
																}
															?>
														</div>
													</div>
													<?php if (!empty(trim($result['services']))) : ?>
														<div class="plans-container">
															<div class="plans">
																<span class="heading">Services: </span><span class="value"><?php echo $result['services']; ?></span>
															</div>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
									
									<?php if ($result['provider_count'] > 0) : ?>
									
										<div class="providers-container">
											<div class="providers-header ">
												<div id="heading-<?php echo $count; ?>" class="provider-number-container">
													<div class="icon">
														<i class="far fa-users"></i>
														<span class="number"><?php echo $result['provider_count']; ?></span>
													</div>
													<div class="heading">Providers at this location</div>
													<div class="chevron">
														<div class="icon"><i class="far fa-chevron-down"></i></div>
													</div>
												</div>
											</div>
											<div class="providers-listing-container">
												<div id="listing-<?php echo $count; ?>" class="providers-listing" style="display:none;">
													<div class="providers-name-container">
														<?php
															$c=0;
															foreach ($result['providers'] as $provider) {
																$c++;
																echo '<a id="provider-' . $count . '-' . $c .'">';
																	echo '<div class="provider greyblue">' . $provider['provider_name'] . '<span><i class="far fa-plus"></i></span></div>';
																echo '</a>';
																echo '<div id="provider-details-' . $count . '-' . $c . '" class="provider-details" style="display:none;">';
																	echo '<div class="provider-details-row">';
																		echo '<div class="column">';
																			if (strlen($provider['license_no']) > 0) :
																				echo '<div class="inner-row">';
																					echo '<div class="heading">License #:</div>';
																					echo '<div class="value">' . $provider['license_no'] . '</div>';
																				echo '</div>';
																			endif;
																			if (strlen($provider['npi']) > 0) :
																				echo '<div class="inner-row">';
																					echo '<div class="heading">NPI #:</div>';
																					echo '<div class="value">' .  $provider['npi'] . '</div>';
																				echo '</div>';
																			endif;
																		echo '</div>';
																		if ($provider['gender']) :
																			echo '<div class="column">';
																				echo '<div class="inner-row">';
																					echo '<div class="heading">Gender:</div>';
																					echo '<div class="value">' .  $provider['gender'] . '</div>';
																				echo '</div>';
																			echo '</div>';
																		endif;
																	echo '</div>';
																echo '</div>';
																echo '<script>';
																	echo 'jQuery(document).ready(function($){';
																		echo '$("a#provider-' . $count . '-' . $c . '").click(function(){';
																			echo '$("#provider-details-' . $count . '-' . $c . '").toggle();';
																			echo '$("a#provider-' . $count . '-' . $c . ' span i").toggleClass("fa-plus fa-minus");';
																			echo '$("a#provider-' . $count . '-' . $c . ' .provider").toggleClass("gold greyblue");';
																		echo '});';
																	echo '});';
																echo '</script>';
															}
														?>
													</div>
												</div>
											</div>
										</div>
										<script>
											jQuery(document).ready(function($){
												$("#heading-<?php echo $count; ?>").click(function(){
													$("#listing-<?php echo $count; ?>").toggle();
													$("a#heading-<?php echo $count; ?> .icon i").toggleClass("fa-chevron-down fa-chevron-up");
												});
											});
										</script>
										
									<?php endif; ?>
									
								</div>
					<?php			
							endforeach;	
						endif;
					?>	

			</div>
		</div>
	</div>	
</section> 

<script type="text/javascript">
	jQuery(document).ready(function($){
		$( "#location" ).click( function(e) {
			e.preventDefault();

			var is_chrome = /chrom(e|ium)/.test( navigator.userAgent.toLowerCase() );
			var is_ssl    = 'https:' == document.location.protocol;
			if( is_chrome && ! is_ssl ){
				return false;
			}
	 
			navigator.geolocation.getCurrentPosition(
				function( position ){ 
	 
					var lat = position.coords.latitude;
					var lng = position.coords.longitude;
					var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					geocoder = new google.maps.Geocoder();
					
						geocoder.geocode({'latLng': latlng}, function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								if (results[0]) {
									for (j = 0; j < results[0].address_components.length; j++) {
										if (results[0].address_components[j].types[0] == 'postal_code')										
											var zipcode = results[0].address_components[j].short_name;
											var data = {
												"action" : "location_zipcode",
												"zipcode" : zipcode
											};
											$.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(results){
												location.reload(true);
											});	
									}
								}
							} 
						});
					
				},
				function(){ 
				}
			);
		});
	});
</script> 
	