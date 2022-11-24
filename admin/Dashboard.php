<?php

namespace W3F\admin;

if ( ! class_exists( 'Dashboard' ) ) {
	class Dashboard {
		public static function init() {
			add_action( 'admin_menu', 'W3F\admin\Dashboard::tl_menu_page' );
			add_action( 'admin_menu', 'W3F\admin\Dashboard::sub_menu_page' );
		}

		public static function tl_menu_page() {
			add_menu_page(
				'W3F Gift List',
				'W3F Gift',
				'manage_options',
				'gift_list',
				'W3F\admin\Dashboard::gift_page_html',
				'dashicons-image-filter',
				20
			);
		}
		public static function sub_menu_page() {
			add_submenu_page(
				'gift_list',
				'W3F Gift List',
				'Gift List',
				'manage_options',
				'gift_list',
				'W3F\admin\Dashboard::gift_page_html',
				20
			);
			add_submenu_page(
				'gift_list',
				'W3F Gift settings',
				'Gift settings',
				'manage_options',
				'gift_settings',
				'W3F\admin\Dashboard::settings_page_html',
				20
			);
		}

		public static function settings_page_html() {
			$w3f_api_key = '';
			?>
			<div class="wrap">
				<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
				<form action="<?php menu_page_url( 'gift_list' ) ?>" method="post">
					<label>Entrez la valeur de l'API KEY
						<input type="text" value="<?php echo( $w3f_api_key ) ?>">
					</label>
					<?php
					// output security fields for the registered setting "w3f_options"
					settings_fields( 'w3f_options' );
					// output setting sections and their fields
					// (sections are registered for "gift_list", each field is registered to a specific section)
					do_settings_sections( 'gift_list' );
					// output save settings button
					submit_button( __( 'Enregister la clé Paygate', 'textdomain' ) );
					?>
				</form>
			</div>
			<?php
		}

		public static function gift_page_html() {
			// check user capabilities
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
			?>
			<div class="wrap">
				<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			</div>
			<?php
		}
	}
}