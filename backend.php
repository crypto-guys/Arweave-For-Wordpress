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

 // returns an objects size to be used to limit to 2mb
return_object_size(){
     $size = $ipfs->size($hash);
 }

// Retrieves the contents of a single hash.
 function AWV__get_ipfs_content($hash){
   $ipfs->cat($hash);
}
