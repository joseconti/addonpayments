<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    function addonp_user_type_label_field(){
   $option = get_option( 'addonp_user_type_label_field' );
   ?>
   <select id="user_type" name="addonp_user_type_label_field">
       <option value="private_user" <?php if ( $option == 'private_user') echo ' selected'; ?>><?php _e('Private User', 'addonpayments' ); ?></option>
       <option value="business" <?php if ( $option == 'business') echo ' selected'; ?>><?php _e('Business', 'addonpayments' ); ?></option>
       <option value="self-employed" <?php if ( $option == 'self-employed') echo ' selected'; ?>><?php _e('Self-employed', 'addonpayments' ); ?></option>
    </select>
<?php   }

    function addonp_price_with_tax_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_price_with_tax_field" title="<?php _e('Activate Tax', 'addonpayments' ); ?>" name="addonp_price_with_tax_field" value="1" <?php checked(1, get_option('addonp_price_with_tax_field'), true); ?>/>
    <?php }

    function addonp_price_with_or_without_tax_field(){
   $option = get_option( 'addonp_price_with_or_without_tax_field' );
   ?>
   <select id="user_type" name="addonp_price_with_or_without_tax_field">
       <option value="withouttax" <?php if ( $option == 'withouttax') echo ' selected'; ?>><?php _e('Without Tax', 'addonpayments' ); ?></option>
       <option value="withtax" <?php if ( $option == 'withtax') echo ' selected'; ?>><?php _e('With Tax', 'addonpayments' ); ?></option>
    </select>
<?php   }

    function addonp_percent_tax_field(){ ?>
    <input title="<?php _e('% Tax to apply', 'addonpayments' ); ?>" type="text" name="addonp_percent_tax_field" value="<?php echo get_option('addonp_percent_tax_field'); ?>" placeholder="<?php _e( 'EX: 21 or 15.5', 'addonpayments' ); ?>" size="40" />
    <?php }

    function addonp_apply_retention_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_apply_retention" title="<?php _e('Apply Retention', 'addonpayments' ); ?>" name="addonp_apply_retention_field" value="1" <?php checked(1, get_option('addonp_apply_retention_field'), true); ?>/>
    <?php }

    function addonp_percent_retention_field(){ ?>
    <input title="<?php _e('% Retention to apply', 'addonpayments' ); ?>" type="text" name="addonp_percent_retention_field" value="<?php echo get_option('addonp_percent_retention_field'); ?>" placeholder="<?php _e( 'EX: 21 or 15.5', 'addonpayments' ); ?>" size="40" />
    <?php }



    function addonp_apply_retention_to_private_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_apply_retention_to_private" title="<?php _e('Apply Retention to Private User', 'addonpayments' ); ?>" name="addonp_apply_retention_to_private_field" value="1" <?php checked(1, get_option('addonp_apply_retention_to_private_field'), true); ?>/>
    <?php }

    function addonp_apply_retention_to_business_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_apply_retention_to_business" title="<?php _e('Apply Retention to Business', 'addonpayments' ); ?>" name="addonp_apply_retention_to_business_field" value="1" <?php checked(1, get_option('addonp_apply_retention_to_business_field'), true); ?>/>
    <?php }

    function addonp_apply_retention_to_self_employed_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_apply_retention_to_self_employed" title="<?php _e('Apply Retention to Self Employed', 'addonpayments' ); ?>" name="addonp_apply_retention_to_self_employed_field" value="1" <?php checked(1, get_option('addonp_apply_retention_to_self_employed_field'), true); ?>/>
    <?php }


    function display_addonp_advanced_settings_panel_fields(){

    add_settings_section( 'addonp-advanced-settings-section', NULL, NULL, 'addonp-advanced-settings-options' );

    add_settings_field( 'addonp_user_type_label_field', __('User Type', 'addonpayments'), 'addonp_user_type_label_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_price_with_tax_field', __('Activate Tax', 'addonpayments'), 'addonp_price_with_tax_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_percent_tax_field', __('% Tax to apply', 'addonpayments'), 'addonp_percent_tax_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_price_with_or_without_tax_field', __('I will add prices ', 'addonpayments'), 'addonp_price_with_or_without_tax_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_apply_retention_field', __('Apply Retention', 'addonpayments'), 'addonp_apply_retention_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_percent_retention_field', __('% Retention to apply', 'addonpayments'), 'addonp_percent_retention_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_apply_retention_to_private_field', __('Apply Retention to Private User', 'addonpayments'), 'addonp_apply_retention_to_private_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_apply_retention_to_business_field', __('Apply Retention to Business', 'addonpayments'), 'addonp_apply_retention_to_business_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
    add_settings_field( 'addonp_apply_retention_to_self_employed_field', __('Apply Retention to Self Employed', 'addonpayments'), 'addonp_apply_retention_to_self_employed_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );

    // register all setings
    register_setting('addonp-advanced-settings-section', 'addonp_user_type_label_field'                  );
    register_setting('addonp-advanced-settings-section', 'addonp_price_with_tax_field'                   );
    register_setting('addonp-advanced-settings-section', 'addonp_price_with_or_without_tax_field'        );
    register_setting('addonp-advanced-settings-section', 'addonp_percent_tax_field'                      );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_field'                  );
    register_setting('addonp-advanced-settings-section', 'addonp_percent_retention_field'                );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_to_private_field'       );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_to_business_field'      );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_to_self_employed_field' );

    }

    add_action('admin_init', 'display_addonp_advanced_settings_panel_fields');