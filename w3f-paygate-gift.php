<?php
/**
 * Plugin Name:       W3 Frame paygate gift
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle gift with paygate
 * Version:           0.0.1
 * Requires at least: >=7.4
 * Requires PHP:      >=7.4
 * Author:            W3 Frame
 * Author URI:        https://w3frame.com/
 * License:           None
 */

namespace W3F;
require_once( 'admin/PaygateApiHelper.php' );
require_once( 'admin/Dashboard.php' );

use W3F\admin\PaygateApiHelper;

//use W3F\admin\Dashboard;

/**
 * Activate gift plugin by register API Key
 * @return void
 */

function activate_gift() {
	// TODO: Check if api key existe, if existe die else create api key option
	if ( class_exists( 'W3F\admin\PaygateApiHelper' ) ) {
		PaygateApiHelper::w3f_register_api_key();
	}
}

register_activation_hook(
	__FILE__,
	'W3F\activate_gift'
);


/**
 * Pulgin desactivation process
 * @return void
 */
function deactivate_gift() {
	if ( class_exists( 'W3F\admin\PaygateApiHelper' ) ) {
		PaygateApiHelper::w3f_remove_api_key();
	}
}

register_deactivation_hook(
	__FILE__,
	'W3F\deactivate_gift'
);

/**
 * Add Top level menu for the plugin
 */
add_action( 'admin_menu', 'W3F\w3f_options_page' );
function w3f_options_page() {

	add_menu_page(
		'W3F Gift',
		'W3F Gift',
		'manage_options',
		'w3f',
		'W3F\w3f_options_page_html',
//        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
		20
	);
}

function w3f_options_page_html() {
	$w3f_api_key = '';
	?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="<?php menu_page_url( 'w3f' ) ?>" method="post">
            <label>Entrez la valeur de l'API KEY
                <input type="text" value="<?php echo( $w3f_api_key ) ?>">
            </label>
			<?php
			// output security fields for the registered setting "w3f_options"
			settings_fields( 'w3f_options' );
			// output setting sections and their fields
			// (sections are registered for "w3f", each field is registered to a specific section)
			do_settings_sections( 'w3f' );
			// output save settings button
			submit_button( __( 'Enregister la clé Paygate', 'textdomain' ) );
			?>
        </form>
    </div>
	<?php
}
