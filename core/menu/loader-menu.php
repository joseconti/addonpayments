<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	require_once( ADDONP_PLUGIN_PATH . 'core/pages/settings.php' );

	function addon_menu() {
		global $addon_settings;

		add_action('admin_menu', 'addonp_register_settings_submenu_page');
		$addon_settings = add_submenu_page(
					        'options-general.php',
					        'AddonPayments',
					        'AddonPayments',
					        'manage_options',
					        'addonpayments-settings',
					        'addonp_register_settings_submenu_page_callback'
					      );

		add_action("admin_print_scripts-$addon_settings", 'addonp_custom_settings_load_js' );

		}

	add_action('admin_menu', 'addon_menu');