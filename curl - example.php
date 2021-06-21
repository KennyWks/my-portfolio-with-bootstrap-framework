<?php


// persiapkan curl
$ch = curl_init();

// set url 
curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCJsT-mOSpe3aWKxp7DL_NIQ&key=AIzaSyDTBhgsl7oHeFhHB4jQDCOFzREFcv8aCd4');

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string 
$output = curl_exec($ch);

if($output === FALSE){
    echo curl_error($ch);
}
// tutup curl 
curl_close($ch);

// menampilkan hasil curl
// echo "Wel $output";

?>