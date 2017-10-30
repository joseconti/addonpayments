<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function addonp_place_currency_sign_field(){
    $option = get_option( 'addonp_place_currency_sign_field' );
    ?>
       <select id="addonp_place_currency_sign_field" name="addonp_place_currency_sign_field">
           <option value="front_space" <?php if ( $option == 'front_space') echo ' selected'; ?>>$ 10</option>
           <option value="front_no_space" <?php if ( $option == 'front_no_space') echo ' selected'; ?>>$10</option>
           <option value="back_no_space" <?php if ( $option == 'back_no_space') echo ' selected'; ?>>10$</option>
           <option value="back_space" <?php if ( $option == 'back_space') echo ' selected'; ?>>10 $</option>
        </select>
    <?php   }

	function addonp_currency_sign_field(){ ?>
    <input title="<?php _e('Currency Sign', 'addonpayments' ); ?>" type="text" name="addonp_currency_sign_field" value="<?php echo get_option('addonp_currency_sign_field'); ?>"  size="40" />
    <?php }


	function addonp_shipping_fields_to_screen_front_label_field(){
	   $option = maybe_unserialize( get_option( 'addonp_shipping_fields_to_screen_front_label_field' ) );
	   $fields = array(
			'user_type' 				=> __( 'User Type', 				    'addonpayments' ),
			'Full_Name' 				=> __( 'Shipping Full Name', 		    'addonpayments' ),
			'shipping_country' 			=> __( 'Shipping Country', 			    'addonpayments' ),
			'shipping_state' 			=> __( 'Shipping State', 			    'addonpayments' ),
			'shipping_postcode' 		=> __( 'Shipping Postcode', 		    'addonpayments' ),
			'shipping_address' 			=> __( 'Shipping Address', 			    'addonpayments' ),
			'shipping_email' 			=> __( 'Shipping Email', 			    'addonpayments' ),
		);

	   ?>
	   <select multiple="multiple" id="addonp_shipping_fields_to_screen_front_label_field" name="addonp_shipping_fields_to_screen_front_label_field[]" class="js-shipping-fields-fron-retention">
	       <?php
			   foreach ( $fields as $code => $field ) { ?>
					<option value="<?php echo $code; ?>" <?php if ( $option && in_array( $code, $option ) ) echo ' selected'; ?>><?php echo $field; ?></option>
				<?php } ?>
	    </select>
	<?php   }

	function addonp_billing_fields_to_screen_front_label_field(){
	   $option = maybe_unserialize( get_option( 'addonp_billing_fields_to_screen_front_label_field' ) );
	   $fields = array(
			'full_name_billing' 		=> __( 'Billing Full Name',			'addonpayments' ),
			'nic_tic_vat_name_billing' 	=> __( 'Billing NIC / TIC / VAT',	'addonpayments' ),
			'billing_country' 			=> __( 'Billing Country', 			'addonpayments' ),
			'billing_state' 			=> __( 'Billing State', 			'addonpayments' ),
			'billing_postcode' 			=> __( 'Billing Postcode', 			'addonpayments' ),
			'billing_address' 			=> __( 'Billing Address', 			'addonpayments' ),
			'billing_email' 			=> __( 'Billing Email', 			'addonpayments' ),
		);

	   ?>
	   <select multiple="multiple" id="addonp_billing_fields_to_screen_front_label_field" name="addonp_billing_fields_to_screen_front_label_field[]" class="js-billing-fields-fron-retention">
	       <?php
			   foreach ( $fields as $code => $field ) { ?>
					<option value="<?php echo $code; ?>" <?php if ( $option && in_array( $code, $option ) ) echo ' selected'; ?>><?php echo $field; ?></option>
				<?php } ?>
	    </select>
	<?php   }

	function addonp_coment1_fields_to_screen_front_label_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_coment1_fields_to_screen_front" title="<?php _e('Show Comment for users Order', 'addonpayments' ); ?>" name="addonp_coment1_fields_to_screen_front_label_field" value="1" <?php checked(1, get_option('addonp_coment1_fields_to_screen_front_label_field'), true); ?>/>
    <?php }

	function addonp_show_price_with_tax_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_show_price_with_tax" title="<?php _e('Show price with tax', 'addonpayments' ); ?>" name="addonp_show_price_with_tax_field" value="1" <?php checked(1, get_option('addonp_show_price_with_tax_field'), true); ?>/>
    <?php }

	function addonp_post_price_included_tax_field(){ ?>
    <input title="<?php _e('Text after price with Tax', 'addonpayments' ); ?>" type="text" name="addonp_post_price_included_tax_field" value="<?php echo get_option('addonp_post_price_included_tax_field'); ?>"  size="40" />
    <?php }

	 function addonp_post_price_excluded_tax_field(){ ?>
    <input title="<?php _e('Text after price without Tax', 'addonpayments' ); ?>" type="text" name="addonp_post_price_excluded_tax_field" value="<?php echo get_option('addonp_post_price_excluded_tax_field'); ?>"  size="40" />
    <?php }















	function display_addonp_frontend_panel_fields(){

		add_settings_section( 'addonp-frontend-settings-section', NULL, NULL, 'addonp-frontend-settings-options' );







		add_settings_field( 'addonp_currency_sign_field', __('Currency Sign EX: $', 'addonpayments'), 'addonp_currency_sign_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_place_currency_sign_field', __('Currency Sign position', 'addonpayments'), 'addonp_place_currency_sign_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_shipping_fields_to_screen_front_label_field', __('Select Shipping Fields to show', 'addonpayments'), 'addonp_shipping_fields_to_screen_front_label_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_billing_fields_to_screen_front_label_field', __('Select Billing Fields to show', 'addonpayments'), 'addonp_billing_fields_to_screen_front_label_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_coment1_fields_to_screen_front_label_field', __('Show Comment for users Order', 'addonpayments'), 'addonp_coment1_fields_to_screen_front_label_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_show_price_with_tax_field', __('Show price with Tax', 'addonpayments'), 'addonp_show_price_with_tax_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_post_price_included_tax_field', __('Text after price with Tax', 'addonpayments'), 'addonp_post_price_included_tax_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_post_price_excluded_tax_field', __('Text after price without Tax', 'addonpayments'), 'addonp_post_price_excluded_tax_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );







		// register all setings

		register_setting('addonp-frontend-settings-section', 'addonp_currency_sign_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_place_currency_sign_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_shipping_fields_to_screen_front_label_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_billing_fields_to_screen_front_label_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_coment1_fields_to_screen_front_label_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_show_price_with_tax_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_post_price_included_tax_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_post_price_excluded_tax_field' );


		}

	add_action('admin_init', 'display_addonp_frontend_panel_fields');