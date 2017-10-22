<?php

//if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) || ! current_user_can( 'activate_plugins' ) ) exit();

// remove options added by AddonPayments Plugin

$options = array(
    'addonp_user_type_label_field',
    'addonp_price_with_tax_field',
    'addonp_percent_tax_field',
    'addonp_apply_retention_field',
    'addonp_percent_retention_field',
    'addonp_price_with_or_without_tax_field'
    );

foreach ( $options as $option ){

    delete_option( $option );

}