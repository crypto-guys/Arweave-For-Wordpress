<?php
/*
 * Arweave Importer for Wordpress
 *
 */

 // Exit if accessed directly
 defined( 'ABSPATH' ) || die( 'Arweave is for all!' );


 require_once dirname ( __FILE__ ) . '/utils.php';
 require_once dirname ( __FILE__ ) . '/arweave.php';
 require_once dirname ( __FILE__ ) . '/ipfs.php';
 require_once dirname ( __FILE__ ) . '/vendor/autoload.php';
 require_once dirname ( __FILE__ ) . '/render_settings.php';
//  require_once dirname ( __FILE__ ) . '/vendor/arweave/arweave-sdk/Arweave/SDK/Arweave.php';
 //===================================================================================
// Global definitions
//===================================================================================

if ( !defined( 'AWV_PLUGIN_NAME' )) {
  define( 'AWV_PLUGIN_NAME' , 'Arweave2IPFS' );
}
if ( !defined( 'AWV_VERSION' )) {
  define( 'AWV_VERSION' , '1.00' );
}
if ( !defined( 'AWV_EDITION' )) {
  define( 'AWV_EDITION' , 'Standard' );
}
if ( !defined( 'AWV_SETTINGS_NAME' )) {
  define( 'AWV_SETTINGS_NAME' , 'AWV-Settings' );
}
if ( !defined( 'AWV_MUST_LOAD_WP' )) {
  define('AWV_MUST_LOAD_WP',  '1');
}
// i18n plugin domain for language files
//  define( 'AWV_I18N_DOMAIN', 'AWV' );

$admin_email = "admin@test.php";
/*
$config = array(
   "urls" => array(
     "baseUrl" => "http://127.0.0.1:5001/api/v0/object/get"
   ),
   "emails" => array(
     "admin" -> $admin_email,
   ),
   "logs" => array(
     "arweave_log" => $_SERVER["DOCUMENT_ROOT"] . "/logs/ar_transaction.log",
     "ipfs_log" => $_SERVER["DOCUMENT_ROOT"] . "/logs/ipfs_transaction.log",
   ),
);
*/
?>
