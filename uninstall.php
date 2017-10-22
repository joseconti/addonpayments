<?php

//if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) || ! current_user_can( 'activate_plugins' ) ) exit();

// remove options added by AddonPayments Plugin

$options = array(
    'option1'
    );

foreach ( $options as $option ){

    delete_option( $option );

}