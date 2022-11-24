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

use W3F\admin\Dashboard;
use W3F\admin\PaygateApiHelper;

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

Dashboard::init();
