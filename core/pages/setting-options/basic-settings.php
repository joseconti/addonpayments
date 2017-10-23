<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function addonp_test_mode_field(){ ?>

     <input type="checkbox" class="js-switch-addonp_test_mode" title="<?php _e('Test Mode', 'addonpayments' ); ?>" name="addonp_test_mode_field" value="1" <?php checked(1, get_option('addonp_test_mode_field'), true); ?>/>
    <?php }

	function addonp_merchant_id_field(){ ?>
    <input title="<?php _e('Merchant ID', 'addonpayments' ); ?>" type="text" name="addonp_merchant_id_field" value="<?php echo get_option('addonp_merchant_id_field'); ?>"  size="40" />
    <?php }

	function addonp_shared_secret_field(){ ?>
    <input title="<?php _e('Merchant ID', 'addonpayments' ); ?>" type="text" name="addonp_shared_secret_field" value="<?php echo get_option('addonp_shared_secret_field'); ?>"  size="40" />
    <?php }

	function addonp_currency_field(){
    $option = get_option( 'addonp_currency_field' );
    ?>
	   <select id="addonp_currency_field" name="addonp_currency_field">
	       <option value="EUR" <?php if ( $option == 'EUR') echo ' selected'; ?>>EUR</option>
	       <option value="GBP" <?php if ( $option == 'GBP') echo ' selected'; ?>>GBP</option>
	       <option value="USD" <?php if ( $option == 'USD') echo ' selected'; ?>>USD</option>
	    </select>
    <?php   }


	function display_addonp_basic_settings_panel_fields(){

    add_settings_section( 'addonp-basic-settings-section', NULL, NULL, 'addonp-basic-settings-options' );

    add_settings_field( 'addonp_test_mode_field', __('Test Mode', 'addonpayments'), 'addonp_test_mode_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_merchant_id_field', __('Merchand ID', 'addonpayments'), 'addonp_merchant_id_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_shared_secret_field', __('Shared Secret', 'addonpayments'), 'addonp_shared_secret_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_currency_field', __('Currency', 'addonpayments'), 'addonp_currency_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );

    // register all setings
    register_setting('addonp-basic-settings-section', 'addonp_test_mode_field' );
    register_setting('addonp-basic-settings-section', 'addonp_merchant_id_field' );
    register_setting('addonp-basic-settings-section', 'addonp_shared_secret_field' );
    register_setting('addonp-basic-settings-section', 'addonp_currency_field' );

	}

	add_action('admin_init', 'display_addonp_basic_settings_panel_fields');