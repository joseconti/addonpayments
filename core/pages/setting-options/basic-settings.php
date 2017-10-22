<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function addonp_preaviso_notificar2_field(){ ?>

     <input type="checkbox" class="js-switch-preavisonotificar" title="<?php _e('SEUR field description', 'addonpayments' ); ?>" name="addonp_preaviso_notificar2_field" value="1" <?php checked(1, get_option('addonp_preaviso_notificar2_field'), true); ?>/>
    <?php }


	function display_addonp_basic_settings_panel_fields(){

    add_settings_section( 'addonp-basic-settings-section', NULL, NULL, 'addonp-basic-settings-options' );

    add_settings_field( 'addonp_preaviso_notificar2_field', __('Notificar recogida', 'addonpayments'), 'addonp_preaviso_notificar2_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );

    // register all setings
    register_setting('addonp-basic-settings-section', 'addonp_preaviso_notificar2_field' );

	}

	add_action('admin_init', 'display_addonp_basic_settings_panel_fields');