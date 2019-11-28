<?php
/*
 * Arweave Importer for Wordpress
 *
 */

require_once dirname ( __FILE__ ) . '/include-all.php';

// Exit if accessed directly
defined( 'ABSPATH' ) || die( 'Arweave is for all!' );




// Plugin Settings use Wordpress Settings API
add_action( 'admin_init', 'AWV__admin_init' );
function AWV__admin_init() {

//  add_settings_section( 'ipfs_settings', '', 'AWV_render_ipfs_settings_section', 'awv_ipfs_settings' );
//==============================================================================
// Register General Settings
//==============================================================================
	register_setting(
    'general_settings', // string $option_group,
    'delete_db_tables_on_uninstall', // string $option_name,
    'sanitize_text_field', // callable $sanitize_callback = ''
  );
  //==============================================================================
  // Settings Sections
  //==============================================================================
  add_settings_section(
     'general_settings', // string $id,
     'General Settings', // string $title
     'AWV_render_general_settings_section', // callable $callback,
     'awv_settings' ); // string $page
//	add_settings_section( 'ipfs_settings', '', 'AWV_render_ipfs_settings_section', 'awv_ipfs_settings' );

//==============================================================================
// Register IPFS settings
//==============================================================================
//	register_setting( 'ipfs_settings', '', 'AWV__validate');
}
add_action( 'admin_init', 'AWV__admin_init' );
//==============================================================================
// Render General settings
//==============================================================================
/*
add_settings_field(
    string $id,
    string $title,
    callable $callback,
    string $page,
    string $section = 'default',
    array $args = []
);
*/
function AWV__render_general_settings_section() {
	echo 'Settings on this tab apply to the plugin as a whole';
	add_settings_field(
    'delete_db_tables_on_uninstall',
    'Delete all plugin database tables and data on uninstall',
    'AWV_delete_all_display',
    'awv_settings',
    'general_settings' );
}
//==============================================================================
//Render Api settings tab
//==============================================================================
//function AWV__render_ipfs_settings_section() {

//}

//==============================================================================
// General Settings
//==============================================================================
function AWV_delete_all_display() {
    $setting = esc_attr( get_option( 'delete_db_tables_on_uninstall' ) );?>
    <input type="checkbox" name="delete_db_tables_on_uninstall" value="1" <?php checked(1, esc_attr( get_option('delete_db_tables_on_uninstall') ), true); ?> />
    <br>If checked: all plugin settings, database tables, and data will be removed from Wordpress database upon plugin uninstall.
		<?php
}

//==============================================================================
// IPFS SETTINGS
//==============================================================================
function AWV_api_settings_section_callback(  ) {
    echo __( 'This Section Description', 'wordpress' );
}

// Render the admin page
function AWV_render_options_page() {
  ?>
<form action='options.php' method='post'>
  <h2>Sitepoint Settings API Admin Page</h2>
<?php
settings_fields( 'general_settings' );	//pass slug name of page, also referred
                                       //to in Settings API as option group name
do_settings_sections( 'general_settings' ); 	//pass slug name of page
submit_button();
?>
</form>
<?php
}
?>
