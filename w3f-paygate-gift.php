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
require_once ('W3f_paygate_api_helper.php');

use W3F\W3f_paygate_api_helper;

/**
 * Register API with default value
 */
if ( class_exists( 'W3f_paygate_api_helper' ) ) {
	W3f_paygate_api_helper::w3f_register_api_key();
}

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
		'w3f_options_page_html',
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
