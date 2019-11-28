<?php
/*
 * Arweave Importer for Wordpress
 *
 */

 // Exit if accessed directly
 defined( 'ABSPATH' ) || die( 'Arweave is for all!' );

 require_once dirname ( __FILE__ ) . '/include-all.php';
//********************************
//* Arweave Functions
//********************************
// Use WP to retrieve data from $url
function AWV__file_get_contents ( $url, $timeout = 60 ) {
	$response = wp_remote_get( $url, $timeout );
	$resp_code = wp_remote_retrieve_response_code( $response );
	$content = wp_remote_retrieve_body( $response );
	if (200 == wp_remote_retrieve_response_code($response) ) {
		return ( $content );
	} else {
		return false;
	}
}

function AWV__make_api_url(){
  $local_api_url = 'http://127.0.0.1:5001/api/v0/object/get';
  $parameters = [
  'arg' => "$hash",
  'data-encoding' => "$content_type"
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL
}

//********************************
//* IPFS Functions
//********************************
function AWV__get_hash_from_form_input(){
  // echo "<h6>Name " . $_GET["name"] . "</h6>";
  $hash = $_GET["hash"];
  return $hash;
}

function AWV__make_get_size_url($hash){
  $local_api_url = 'http://127.0.0.1:5001/api/v0/object/get';
  $parameters = [
  'arg' => $hash,
  ];
$qs = http_build_query($parameters); // query string encode the parameters
$size_request = "{$url}?{$qs}"; // create the request URL
}

function AWV__choose_data_type($encoding, $hash){
  if ($encoding = 'base64'){
    $base64 = get_ipfs_contents_base64($hash);
      } else {
  if ($encoding = 'text'){
    $text = get_ipfs_contents_text($hash);
  }
  }
}

function AWV__get_ipfs_contents_base64($hash, $encoding){
  $url = make_api_url($hash, $encoding);
  $result = curl_for_data( $url );
}

function AWV__ipfs_getsize($size_request){
  $size = curl_for_size();
}

function AWV__curl_for_data($url){
  $curl = curl_init(); // Get cURL resource
  // Set cURL options
  curl_setopt_array($curl, array(
  CURLOPT_URL => $url,            // set the request URL
  // CURLOPT_HTTPHEADER => $headers,     // set the headers
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));
  $response = curl_exec($curl); // Send the request, save the response
  curl_close($curl); // Close request
}

function AWV__curl_for_size($size_request){
  $curl = curl_init(); // Get cURL resource
  // Set cURL options
  curl_setopt_array($curl, array(
  CURLOPT_URL => $size_request,            // set the request URL
  // CURLOPT_HTTPHEADER => $headers,     // set the headers
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));
  $size = curl_exec($curl); // Send the request, save the response
  curl_close($curl); // Close request
}

/*
 *  // make function then log
function AWV__log_arweave_transaction_id($transaction_id){
  printf ('%s', $transaction_id));
  printf("\n");
*/

function AWV__render_index_html(){
  ?>
  <main role="main">
    <div class="jumbotron text-center p-5">
      <img class="logo-main" src="img/arweave.png" alt="Import IPFS content to Arweave" />
          <h1>IPFS 2 ARWEAVE tool</h1>
          <p class="lead">Easily store IPFS content to Arweave</p>
      <p>This tool will allow you to import IPFS content to Arweave</p>
      <!-- user input form -->
      <form action="/ipfsgetdata.php">
      Content Hash: <input type="text" name="hash"><br>
      Encoding: <input type="radio" name="encoding" value="plaintext" checked> Plaintext
      <input type="radio" name="encoding" value="base64"> Base64<br>
      <input type="submit" value="Submit">
      </form>
      <!-- END user input form -->
      <a href="ipfs.html"<img srs="img/getstarted.png" alt="Click here to start" />
      <h4 class="mb-4">Stay up to date:</h4>

      <ul id="sm-links" class="nav justify-content-center">
        <li class="nav-item">
          <a href="https://discord.gg/SGbCefv"><img src="img/discord.png" alt="Discord" /></a>
        </li>
      </ul>
      <!-- end #sm-links -->

      </div>
    <!-- end .jumbotron -->
    <?php
}



?>
