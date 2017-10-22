<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	require_once( ADDONP_PLUGIN_PATH . 'core/pages/settings.php' );

	add_action('admin_menu', 'addon_register_settings_submenu_page');

	function addon_register_settings_submenu_page() {
	   $addon_settings = add_submenu_page(
					        'options-general.php',
					        'AddonPayments',
					        'AddonPayments',
					        'manage_options',
					        'addonpayments-settings',
					        'addon_register_settings_submenu_page_callback'
					      );
	}