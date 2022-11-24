<?php

namespace W3F;
require_once( 'W3f_paygate_api_helper.php' );
use W3F\admin\PaygateApiHelper;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}


if ( class_exists( 'W3F\admin\PaygateApiHelper' ) ) {
	PaygateApiHelper::w3f_remove_api_key();
}
