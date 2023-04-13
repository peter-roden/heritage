<?php /* Template Name: Import */ ?>

<?php

global $wpdb;
date_default_timezone_set('America/New_York'); 

$dir	  = WP_CONTENT_DIR . '/uploads/imports/';
$log_file = WP_CONTENT_DIR . '/uploads/imports/' . 'log.txt';

$log = '' . PHP_EOL;
file_put_contents ($log_file, $log, FILE_APPEND);

$files 	= scandir($dir,SCANDIR_SORT_DESCENDING);
$found  = FALSE;
foreach ($files as $file) {
	if($file === '.' || $file === '..') {continue;}
	if (!$found) {
		if (strpos($file,'.zip') > 0) { 
			$found 		= TRUE;
			$batch 		= substr($file,0,strpos($file,'_'));
			$zipfile 	= WP_CONTENT_DIR . '/uploads/imports/' . $file;
			$subdir		= WP_CONTENT_DIR . '/uploads/imports/' . substr($file,0,strpos($file,'_'));
		}
	}
}

$zip_success = FALSE;
$zip = new ZipArchive;
if ($zip->open($zipfile) === TRUE) {
	$zip->extractTo($subdir);
	$zip->close();
	$zip_success = TRUE;
} 

$files 	= scandir($subdir,SCANDIR_SORT_ASCENDING);
if ($files) :
	
	echo   date("Y-m-d h:i:sa") . ' ' . $zipfile . ' processing started.' . '<br>';
	$log = date("Y-m-d h:i:sa") . ' ' . $zipfile . ' processing started...' . PHP_EOL;
	file_put_contents ($log_file, $log, FILE_APPEND);
	
	foreach ($files as $file) :
		
		if($file === '.' || $file === '..') {continue;}
		$table = substr($file,4,(strpos($file,$batch)));
		$table = substr($table,0,strpos($table,'_'));
		
		switch ($table) {
			case 'license':
				import_license ($zipfile, $file, $table, $batch, $log_file);
				break;
			case 'location':
				import_location ($zipfile, $file, $table, $batch, $log_file);
				break;
			case 'network':
				import_network ($zipfile, $file, $table, $batch, $log_file);
				break;
			case 'participation':
				import_participation ($zipfile, $file, $table, $batch, $log_file);
				break;
			case 'provider':
				import_provider ($zipfile, $file, $table, $batch, $log_file);
				break;
		}
				
	endforeach;
	
	echo   date("Y-m-d h:i:sa") . ' ' . $zipfile . ' processing complete.' . '<br>';
	$log = date("Y-m-d h:i:sa") . ' ' . $zipfile . ' processing complete...' . PHP_EOL;
	file_put_contents ($log_file, $log, FILE_APPEND);

else :
	
	echo   date("Y-m-d h:i:sa") . ' ' . $zipfile . ' processing failed.' . '<br>';
	$log = date("Y-m-d h:i:sa") . ' ' . $zipfile . ' processing failed.' . PHP_EOL;
	file_put_contents ($log_file, $log, FILE_APPEND);
	
endif;

?>