<?php
namespace W3F\admin;
if ( ! class_exists( 'W3f_paygate_api_helper' ) ) {
	class PaygateApiHelper {
		private static string $option= "w3f_paygate_api_key";

		public static function w3f_register_api_key() {
			add_option( PaygateApiHelper::$option, '', '', true );
		}

		public static function w3f_remove_api_key() {
			delete_option(  PaygateApiHelper::$option );
		}

		public static function w3f_get_api_key() {
			get_option(  PaygateApiHelper::$option, false );
		}

		public static function w3f_update_api_key() {
			update_option(  PaygateApiHelper::$option, "new Value" );
		}

	}
}