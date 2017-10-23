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

        $user_type         = get_option( 'addonp_user_type_label_field'           );
        $tax_active        = get_option( 'addonp_price_with_tax_field'            );
        $price_with_tax    = get_option( 'addonp_price_with_or_without_tax_field' );
        $percent_tax       = get_option( 'addonp_percent_tax_field'               );
        $retention         = get_option( 'addonp_apply_retention_field'           );
        $percent_retention = get_option( 'addonp_percent_retention_field'         );

        // Attributes
        $atts = shortcode_atts(c
            array(
                'id'    => '',
                'price' => '',
            ),
            $atts
        );

        return $atts;

    }
    add_shortcode( 'addonpayments', 'addonp_price_shortcode' );