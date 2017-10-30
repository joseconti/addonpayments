<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    // Register Custom Post Type
function addonp_orders_ctp() {

    $labels = array(
        'name'                  => _x( 'Orders', 'Post Type General Name', 'addonpayments' ),
        'singular_name'         => _x( 'Order', 'Post Type Singular Name', 'addonpayments' ),
        'menu_name'             => __( 'AddonPayments Orders', 'addonpayments' ),
        'name_admin_bar'        => __( 'Orders', 'addonpayments' ),
        'archives'              => __( 'Orders Archives', 'addonpayments' ),
        'attributes'            => __( 'Orders Attributes', 'addonpayments' ),
        'parent_item_colon'     => __( 'ParentOrder:', 'addonpayments' ),
        'all_items'             => __( 'All orders', 'addonpayments' ),
        'add_new_item'          => __( 'Add New Order', 'addonpayments' ),
        'add_new'               => __( 'Add New', 'addonpayments' ),
        'new_item'              => __( 'New Order', 'addonpayments' ),
        'edit_item'             => __( 'Edit Order', 'addonpayments' ),
        'update_item'           => __( 'Update Order', 'addonpayments' ),
        'view_item'             => __( 'View Order', 'addonpayments' ),
        'view_items'            => __( 'View Order', 'addonpayments' ),
        'search_items'          => __( 'Search Order', 'addonpayments' ),
        'not_found'             => __( 'Not found', 'addonpayments' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'addonpayments' ),
        'featured_image'        => __( 'Featured Image', 'addonpayments' ),
        'set_featured_image'    => __( 'Set featured image', 'addonpayments' ),
        'remove_featured_image' => __( 'Remove featured image', 'addonpayments' ),
        'use_featured_image'    => __( 'Use as featured image', 'addonpayments' ),
        'insert_into_item'      => __( 'Insert into item', 'addonpayments' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Order', 'addonpayments' ),
        'items_list'            => __( 'Orders list', 'addonpayments' ),
        'items_list_navigation' => __( 'Orders list navigation', 'addonpayments' ),
        'filter_items_list'     => __( 'Filter Orders list', 'addonpayments' ),
    );
    $args = array(
        'label'                 => __( 'Order', 'addonpayments' ),
        'description'           => __( 'Orders from AddonPayments', 'addonpayments' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'custom-fields', ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 10,
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
         'map_meta_cap'         => true,
    );
    register_post_type( 'addonp_orders', $args );

    // Status

    register_post_status( 'addonp-pending-paid', array(
		'label'                     => _x( 'Pending', 'post status label', 'addonpayments' ),
		'public'                    => true,
		'label_count'               => _n_noop( 'Pending (%s)', 'Pending (%s)', 'addonpayments' ),
		'post_type'                 => array( 'addonp_orders' ), // Define one or more post types the status can be applied to.
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'show_in_metabox_dropdown'  => true,
		'show_in_inline_dropdown'   => true,
		'dashicon'                  => 'dashicons-yes',
	) );

	register_post_status( 'addonp-paid', array(
		'label'                     => _x( 'Paid', 'post status label', 'addonpayments' ),
		'public'                    => true,
		'label_count'               => _n_noop( 'Paid (%s)', 'Paid (%s)', 'addonpayments' ),
		'post_type'                 => array( 'addonp_orders' ), // Define one or more post types the status can be applied to.
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'show_in_metabox_dropdown'  => true,
		'show_in_inline_dropdown'   => true,
		'dashicon'                  => 'dashicons-yes',
	) );

	register_post_status( 'addonp-suspended', array(
		'label'                     => _x( 'Suspended', 'post status label', 'addonpayments' ),
		'public'                    => true,
		'label_count'               => _n_noop( 'Suspended (%s)', 'Suspended (%s)', 'addonpayments' ),
		'post_type'                 => array( 'addonp_orders' ), // Define one or more post types the status can be applied to.
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'show_in_metabox_dropdown'  => true,
		'show_in_inline_dropdown'   => true,
		'dashicon'                  => 'dashicons-yes',
	) );

	register_post_status( 'addonp-error', array(
		'label'                     => _x( 'Error', 'post status label', 'addonpayments' ),
		'public'                    => true,
		'label_count'               => _n_noop( 'Error (%s)', 'Error (%s)', 'addonpayments' ),
		'post_type'                 => array( 'addonp_orders' ), // Define one or more post types the status can be applied to.
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'show_in_metabox_dropdown'  => true,
		'show_in_inline_dropdown'   => true,
		'dashicon'                  => 'dashicons-yes',
	) );

	register_post_status( 'addonp-check', array(
		'label'                     => _x( 'Check AddonPayments', 'post status label', 'addonpayments' ),
		'public'                    => true,
		'label_count'               => _n_noop( 'Check AddonPayments (%s)', 'Check AddonPayments (%s)', 'addonpayments' ),
		'post_type'                 => array( 'addonp_orders' ), // Define one or more post types the status can be applied to.
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'show_in_metabox_dropdown'  => true,
		'show_in_inline_dropdown'   => true,
		'dashicon'                  => 'dashicons-yes',
	) );

}
add_action( 'init', 'addonp_orders_ctp', 0 );

add_action('admin_footer-edit.php', 'addonp_orders_custom_append_post_status_list');
function addonp_orders_custom_append_post_status_list(){
     global $post;

     if( $post->post_type == 'addonp_orders' ){
          echo "<script>
        	jQuery(document).ready( function() {
        		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"addonp-pending-paid\">Pending</option>' );
        		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"addonp-paid\">Paid</option>' );
        		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"addonp-suspended\">Suspended</option>' );
        		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"addonp-error\">Error</option>' );
        		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"addonp-check\">Check AddonPayments</option>' );
        		jQuery( 'select[id=\"bulk-action-selector-top\"]' ).append( '<option value=\"addonp-pending-paid\">Pending</option>' );
        		jQuery( 'select[id=\"bulk-action-selector-top\"]' ).append( '<option value=\"addonp-paid\">Paid</option>' );
        		jQuery( 'select[id=\"bulk-action-selector-top\"]' ).append( '<option value=\"addonp-suspended\">Suspended</option>' );
        		jQuery( 'select[id=\"bulk-action-selector-top\"]' ).append( '<option value=\"addonp-error\">Error</option>' );
        		jQuery( 'select[id=\"bulk-action-selector-top\"]' ).append( '<option value=\"addonp-check\">Check AddonPayments</option>' );
        	});
        	</script>";
     }
}


add_filter( 'manage_addonp_orders_posts_columns', 'addonp_orders_custom_columns' );
function addonp_orders_custom_columns( $columns ) {

    unset( $columns['title'] );
    unset( $columns['date'] );
    $columns['order_status']            = __( 'Status',             'addonpayments' );
    $columns['title']                   = __( 'Order',              'addonpayments' );
    $columns['product']                 = __( 'Product',            'addonpayments' );
    $columns['customer_name']           = __( 'Customer Name',      'addonpayments' );
    $columns['email']                   = __( 'Email',              'addonpayments' );
    $columns['customer_comments']       = __( 'Customer Comments',  'addonpayments' );

    return $columns;
}

add_action( 'manage_addonp_orders_posts_custom_column' , 'addonp_custom_orders_column_data', 10, 2 );

function addonp_custom_orders_column_data( $column, $Order ) {

    $user_type                  = get_post_meta( $Order, '_addonp_user_type',                   true );
    $Full_Name                  = get_post_meta( $Order, '_addonp_Full_Name',                   true );
    $shipping_country           = get_post_meta( $Order, '_addonp_shipping_country',            true );
    $shipping_state             = get_post_meta( $Order, '_addonp_shipping_state',              true );
    $shipping_postcode          = get_post_meta( $Order, '_addonp_shipping_postcode',           true );
    $shipping_address           = get_post_meta( $Order, '_addonp_shipping_address',            true );
    $shipping_email             = get_post_meta( $Order, '_addonp_shipping_email',              true );
    $full_name_billing          = get_post_meta( $Order, '_addonp_full_name_billing',           true );
    $nic_tic_vat_name_billing   = get_post_meta( $Order, '_addonp_nic_tic_vat_name_billing',    true );
    $billing_country            = get_post_meta( $Order, '_addonp_billing_country',             true );
    $billing_state              = get_post_meta( $Order, '_addonp_billing_state',               true );
    $billing_postcode           = get_post_meta( $Order, '_addonp_billing_postcode',            true );
    $billing_address            = get_post_meta( $Order, '_addonp_billing_address',             true );
    $billing_email              = get_post_meta( $Order, '_addonp_billing_email',               true );
    $PROD_ID                    = get_post_meta( $Order, '_addonp_PROD_ID',                     true );
    $COMMENT1                   = get_post_meta( $Order, '_addonp_COMMENT1',                    true );
    $base_price                 = get_post_meta( $Order, '_addonp_base_price',                  true );
    $tax                        = get_post_meta( $Order, '_addonp_tax_price',                   true );
    $percent_tax                = get_post_meta( $Order, '_addonp_tax_apply',                   true );
    $percent_retention          = get_post_meta( $Order, '_addonp_retention_apply',             true );
    $retention                  = get_post_meta( $Order, '_addonp_retention_price',             true );
    $post_permanlink            = get_post_meta( $Order, '_addonp_link_where_bought',           true );
    $order_id                   = get_post_meta( $Order, '_addonp_order_id',                    true );
    $order_status_base			= get_post_status( $Order );

    if ( $order_status_base == 'addonp-pending-paid' ) {
	    $order_status = 'Pending';
    } elseif ( $order_status_base == 'addonp-paid' ) {
	    $order_status = 'Paid';
    } elseif ( $order_status_base == 'addonp-suspended' ) {
	    $order_status = 'Suspended';
    } elseif ( $order_status_base == 'addonp-error' ) {
	    $order_status = 'Error';
    }


    switch ( $column ) {

       case 'order_status' :
            echo $order_status;
            break;
        case 'product' :
            echo $PROD_ID;
            break;
        case 'customer_name' :
            echo $Full_Name;
            break;
        case 'email' :
            echo '<a href="mailto:' . $shipping_email . '">' . $shipping_email . '</a>';
            break;
        case 'customer_comments' :
            echo $COMMENT1;
            break;
    }
}