<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function addonp_register_settings_submenu_page_callback(){ ?>

    <div class="wrap">
        <h1><?php echo __( 'AddonPayments Settings', 'addonpayments' ) ?></h1>
                <?php
        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = $_GET[ 'tab' ];
        } else {
            $active_tab = 'basic_settings';
        }
        ?>
        <h2 class="nav-tab-wrapper">
            <a href="options-general.php?page=addonpayments-settings&tab=basic_settings" class="nav-tab <?php echo $active_tab == 'basic_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Basic Settings', 'addonpayments' ); ?></a>
            <a href="options-general.php?page=addonpayments-settings&&tab=advanced_settings" class="nav-tab <?php echo $active_tab == 'advanced_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Advanced Settings', 'addonpayments' ); ?></a>
        </h2>
        <form method="post" action="options.php">
	         <?php if( $active_tab == 'basic_settings' ) { ?>
                <p><?php
                _e('AddonPayments Settings', 'addonpayments' ); ?></p><?php
                settings_fields( "addon-basic-settings-section");
                do_settings_sections( "addon-basic-settings-options" );
            } else { ?>
                <p><?php
                _e( 'AddonPayments Advanced Settings', 'addonpayments' ); ?></p><?php
                settings_fields( "addon-advanced-settings-section");
                do_settings_sections( "addon-advanced-settings-options" );
                }
            submit_button();
            ?>
        </form>
        <script type="text/javascript">

              var preavisonotificar = document.querySelector( '.js-switch-preavisonotificar' );
              if ( preavisonotificar ) {
                  var switchery = new Switchery(preavisonotificar, { size: 'small' } );
                  }

              var repartonotificar = document.querySelector( '.js-switch-repartonotificar' );
              if ( repartonotificar ) {
                var switchery = new Switchery(repartonotificar, { size: 'small' } );
                }

        </script>
    </div>
<?php }

function addonp_settings_load_css( $hook ){
    global $seurconfig;
    if( $seurconfig != $hook ) {
        return;
    } else {
        wp_register_style(  'addon_switchery_css', ADDONP_PLUGIN_URL . '/assets/css/switchery.css', array(), ADDONP_VERSION  );
        wp_enqueue_style(   'addon_switchery_css');
    }
}
add_action( 'admin_enqueue_scripts', 'addonp_settings_load_css' );

//Include all options

include_once( 'setting-options/basic-settings.php'     );
include_once( 'setting-options/advanced-settings.php' );

?>