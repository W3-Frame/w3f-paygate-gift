<?php
namespace W3F;
if ( ! class_exists( 'W3f_paygate_api_helper' ) ) {
	class W3f_paygate_api_helper {

		public static function w3f_register_api_key() {
			add_option( "w3f_paygate_api_key", '', '', true );
		}

		public static function w3f_remove_api_key() {
			delete_option( "w3f_paygate_api_key" );
		}

		public static function w3f_get_api_key() {
			get_option( "w3f_paygate_api_key", false );
		}

		public static function w3f_update_api_key() {
			update_option( "w3f_paygate_api_key", "new Value" );
		}

	}
}