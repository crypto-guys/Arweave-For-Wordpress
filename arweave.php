<?php
/*
Plugin Name: Arweave Importer
Description: Allows registered accounts to archive data to arweave
Version: 1.0
Author: crypto-guys
Author URI: http://authorsite.com/
Plugin URI: http://authorsite.com/arweave-importer
*/

require_once dirname ( __FILE__ ) . '/include-all.php';

// Exit if accessed directly
defined( 'ABSPATH' ) || die( 'Arweave is for all!' );
// Define constants for plugin url and dir
// usage example ARWEAVE_DIR.'assets/img/image.jpg'
define('ARWEAVE_DIR', plugin_dir_path(__FILE__));
define('ARWEAVE_URL', plugin_dir_url(__FILE__));

// Need a session for each user $user is the session specific user
// hows this work if multiple ppl try to run
// session_start();
// if ($user = try_login($login, $password))
//   $_SESSION['user'] = $user;

// Add hooks and filters
register_activation_hook(__FILE__, 'AWV_activate');
register_deactivation_hook(__FILE__, 'AWV_deactivate');

// create custom plugin settings menu
add_action( 'admin_menu', 'AWV_create_menu' );

// Plugin Activation
function AWV_activate(){
  //actions to perform once on plugin activation go here

  //register uninstaller
  register_uninstall_hook(__FILE__, 'AWV_uninstall');
}

// Plugin DeActivation
function AWV_deactivate(){
  //actions to perform once on plugin deactivation go here
}

// Plugin Uninstall
function AWV_uninstall(){
  //actions to perform once on plugin uninstall go here
}

// create new top-level menu for plugin
// http://www.fileformat.info/info/unicode/char/e3f/index.htm

function AWV_custom_post_type(){
    register_post_type('awv_display',
                       array(
                           'labels'      => array(
                               'name'          => __('IPFS'),
                           ),
                           'public'      => true,
                           'has_archive' => true,
                       )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'AWV_custom_post_type' );
function AWV_create_menu() {
	add_menu_page(
		__( 'Arweave For Wordpress'),                    // Page title
		__( 'Arweave' ),                        // Menu Title - lower corner of admin menu
		'administrator',                                        // Capability
		'awv-settings',                                        // Handle - First submenu's handle must be equal to parent's handle to avoid duplicate menu entry.
		'AWV__render_general_settings_section',                   // Function
		plugins_url( '/images/arweave_16x.png', __FILE__ )      // 16x Icon URL
	);
	add_submenu_page(
		'awv-settings',                                        // Parent
		__( 'Arweave For Wordpress' ),                   // Page title
		__( 'General Settings' ),               // Menu Title
		'administrator',                                        // Capability
		'awv-settings',                                        // Handle - First submenu's handle must be equal to parent's handle to avoid duplicate menu entry.
		'AWV__render_general_settings_section'                    // Function
	);
	add_submenu_page(
		'awv-settings',                                        // Parent
		__( 'IPFS Importer Settings' ),       // Page title
		__( 'IPFS Importer Settings' ),       // Menu title
		'administrator',                                       // Capability
		'awv-ipfs-settings',                                   // Handle
		'AWV__render_ipfs_settings_page'                   // Function
	);
}

// load language files
function AWV_set_lang_file() {
	// set the language file
	$currentLocale = get_locale();
	if ( ! empty( $currentLocale ) ) {
		$moFile = dirname( __FILE__ ) . '/lang/' . $currentLocale . '.mo';
		if ( @file_exists( $moFile ) && is_readable( $moFile ) ) {
			load_textdomain( AWV_I18N_DOMAIN, $moFile );
		}
	}
}
?>
