<?php
$hash = $_GET["hash"];
$encoding = $_GET["encoding"];

/*
  function choose_data_type($encoding, $hash){
    if ($encoding = 'base64'){
      get_ipfs_contents_base64($hash);
        } else {
    if $encoding = 'text'{
      get_ipfs_contents_text($hash);
    }
    }
  }
*/
// content is stored in array named $result
$curl = curl_init(); // Get cURL resource
// Inintialize directory name where file will be save
$dir = './';
// Use basename() function to return the base name of file
$file_name = basename($url);
// Save file into file location
$save_file_loc = $dir . $file_name;
// Open file
$fp = fopen($save_file_loc, 'wb');
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));
$response = curl_exec($curl); // Send the request, save the response
curl_close($curl); // Close request


$url = urlencode "'http://localhost:5001/api/v0/object/get?arg=' . '$hash' . &data-encoding= . '$encoding'";
curl( $url );

// verify_ipfs_data(){
?>
