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
add_action( 'admin_menu', 'w3f_options_page' );
function w3f_options_page() {
	add_menu_page(
		'W3F Gift',
		'W3F Options',
		'manage_options',
		'w3f',
		'w3f_options_page_html',
//        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
		20
	);
}

function w3f_options_page_html() {
	?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="" method="post">
			<?php
			// output security fields for the registered setting "w3f_options"
			settings_fields( 'w3f_options' );
			// output setting sections and their fields
			// (sections are registered for "w3f", each field is registered to a specific section)
			do_settings_sections( 'w3f' );
			// output save settings button
			submit_button( __( 'Save Settings', 'textdomain' ) );
			?>
        </form>
    </div>
	<?php
}