<?php
/*
 * Arweave Importer for Wordpress
 *
 */
 require_once dirname ( __FILE__ ) . '/include-all.php';
 // Exit if accessed directly
 defined( 'ABSPATH' ) || die( 'Arweave is for all!' );

 // Use IPFS PHP API
// use Cloutier\PhpIpfsApi\IPFS;

 // connect to ipfs daemon API server
 //$ipfs = new IPFS("localhost", "8080", "5001"); // leaving out the arguments will default to these values

 // Gets the node structure of a hash.
 function AWV__get_node_structure_of_hash($hash){
 $obj = $ipfs->ls($hash);

 foreach ($obj as $e) {
	   echo $e['Hash'];
	   echo $e['Size'];
	   echo $e['Name'];
     // return $dir_contents
  }
}


// returns an objects size to be used to limit to 2mb
function AWV__return_object_size(){
    $size = $ipfs->size($hash);
}

// Retrieves the contents of a single hash.
function AWV__get_ipfs_content($hash){
  $ipfs->cat($hash);
}

?>
