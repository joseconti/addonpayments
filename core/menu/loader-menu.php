<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	require_once( ADDONP_PLUGIN_PATH . 'core/pages/settings.php' );

	function addon_menu() {
		global $addon_settings;


		$menu_title         =   'AddonPayments';
	    $capability         =   'manage_options';
	    $menu_slug          =   'addonpayments-settings';
	    $function           =   'addonp_register_settings_submenu_page_callback';
	    $icon_url           =   NULL;
	    $position           =   NULL;

	    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

			add_action('admin_menu', 'addonp_register_settings_submenu_page');
			$addon_settings = add_submenu_page(
						        $menu_slug,
						        'AddonPayments',
						        'AddonPayments',
						        $capability,
						        'addonpayments-settings',
						        'addonp_register_settings_submenu_page_callback'
						    );
			$addon_orders   = add_submenu_page(
								$menu_slug,
								__( 'Orders', 'seur' ),
								__( 'Orders',   'seur' ),
								$capability,
								'edit.php?post_type=addonp_orders'
							);

		add_action("admin_print_scripts-$addon_settings", 'addonp_custom_settings_load_js' );

	}

	add_action('admin_menu', 'addon_menu');