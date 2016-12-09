<?php

function download_theme(){
	
set_time_limit(0);
//This is the file where we save the    information
$fp = fopen (FCPATH . '/assets/localfile.zip', 'w+');
//Here is the file we are downloading, replace spaces with %20

$url ='http://kelnovi.pinoyxtreme.com/themes/neko_company.zip';

$ch = curl_init(str_replace(" ","%20",$url));
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
// write curl response to file
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// get curl response
curl_exec($ch); 
curl_close($ch);
fclose($fp);

}