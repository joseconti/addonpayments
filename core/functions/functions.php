<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    function addonp_custom_settings_load_js(){
    wp_enqueue_script( 'addonp-switchery',  ADDONP_PLUGIN_URL . '/assets/js/switchery.min.js',  array(), ADDONP_VERSION );
    }

    function addonp_admin_notice_retention_error() {
        $retention_set     = get_option('addonp_apply_retention_field');
        $retention_percent = get_option('addonp_percent_retention_field');
        $class             = 'notice notice-error';
        $message           = __( 'AddonPayments Error: Retention is active, but you dont set Retention %. Please set it', 'addonpayments' );

        if ( $retention_set == '1' && empty( $retention_percent ) ) {

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );

            }
    }

    function addonp_admin_notice_tax_error() {
        $tax_set     = get_option('addonp_price_with_tax_field');
        $tax_percent = get_option('addonp_percent_tax_field');
        $class       = 'notice notice-error';
        $message     = __( 'AddonPayments Error: Tax is active, but you dont set Tax %. Please set it', 'addonpayments' );

        if ( $tax_set == '1' && empty( $tax_percent ) ) {

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );

            }
    }
    add_action( 'admin_notices', 'addonp_admin_notice_retention_error' );
    add_action( 'admin_notices', 'addonp_admin_notice_tax_error' );

    // Add Shortcode
    function addonp_price_shortcode( $atts ) {

        $test			   = get_option( 'addonp_test_mode_field'           	  );
        $merchand_id	   = get_option( 'addonp_merchant_id_field'           	  );
        $secret            = get_option( 'addonp_shared_secret_field'             );
        $user_type         = get_option( 'addonp_user_type_label_field'           );
        $tax_active        = get_option( 'addonp_price_with_tax_field'            );
        $price_with_tax    = get_option( 'addonp_price_with_or_without_tax_field' );
        $percent_tax       = get_option( 'addonp_percent_tax_field'               );
        $retention         = get_option( 'addonp_apply_retention_field'           );
        $percent_retention = get_option( 'addonp_percent_retention_field'         );
        $currency          = get_option( 'addonp_currency_field'                  );
        $timestamp         = get_the_time('YmdHis');
        $str               = 'abcdefghijklmnABCEDEFGHIJKLMNO1234567890';
        $orderid		   = str_shuffle( $str );

        // Attributes
        $atts = shortcode_atts(
            array(
                'product' => '',
                'price'    => '',
            ),
            $atts
        );

        $price = $atts['price'];

        if ( $price_with_tax == '1' ) {
	        $tax = ( $price * ( $percent_tax / 100 ) );
        } else {
	        $tax = '0';
        }

        if ( $retention == '1' ) {
	        $renten = ( $price * ( $percent_retention / 100 ) );
        } else {
	        $renten = '0';
        }

        $final_price_before_point = $price + tax - $renten;
        $final_price = number_format( $final_price_before_point, 2, '', '');
        $string_sha1_1 =  sha1( $timestamp . $merchand_id . $orderid . $final_price . $currency );
        $string_sha1_2 =  sha1( $string_sha1_1 . $secret );


        $form = '<form method="POST" action="https://hpp.sandbox.addonpayments.com/pay">
				<input type="hidden" name="TIMESTAMP" value="' . $timestamp . '">
				<input type="hidden" name="MERCHANT_ID" value="' . $merchand_id . '">
				<input type="hidden" name="ACCOUNT" value="">
				<input type="hidden" name="ORDER_ID" value="' . $orderid . '">
				<input type="hidden" name="AMOUNT" value="' . $final_price . '">
				<input type="hidden" name="CURRENCY" value="' . $currency . '">
				<input type="hidden" name="SHA1HASH" value="' . $string_sha1_2 . '">
				<input type="hidden" name="AUTO_SETTLE_FLAG" value="1">
				<input type="hidden" name="COMMENT1" value="Canal móvil">
				<input type="hidden" name="COMMENT2" value="Pago inicial">
				<input type="hidden" name="SHIPPING_CODE" value="E77|4QJ">
				<input type="hidden" name="SHIPPING_CO" value="GB">
				<input type="hidden" name="BILLING_CODE" value="R90|ZQ7">
				<input type="hidden" name="BILLING_CO" value="GB">
				<input type="hidden" name="CUST_NUM" value="332a85b">
				<input type="hidden" name="VAR_REF" value="Invoice 7564a">
				<input type="hidden" name="PROD_ID" value="' . $atts['product'] . '">
				<input type="hidden" name="HPP_LANG" value="GB">
				<input type="hidden" name="HPP_VERSION" value="2">
				<input type="hidden" name="MERCHANT_RESPONSE_URL" value="https://www.example.com/responseUrl">
				<input type="hidden" name="CARD_PAYMENT_BUTTON" value="Pagar ahora">
				<input type="hidden" name="SUPPLEMENTARY_DATA" value="Valor personalizado">
				<input type="submit" value="Haz clic aquí para comprar">
				</form>';

        return $form;

    }
    add_shortcode( 'addonpayments', 'addonp_price_shortcode' );