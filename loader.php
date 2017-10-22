<?php
/*
Plugin Name: addonpayments
Plugin URI: http://www.addonpayments.com/
Description: Addonpayments
Version: 1.0.0-Alpha1
Author: José Conti
Author URI: https://www.joseconti.com/
Tested up to: 4.8
Text Domain: addonpayments
Domain Path: /languages/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

define( 'ADDONP_VERSION',     '1.0.0-Alpha1'               );
define( 'ADDONP_PLUGIN_PATH',  plugin_dir_path( __FILE__ ) );
define( 'ADDONP_PLUGIN_URL',   plugin_dir_url( __FILE__ )  );

require_once( ADDONP_PLUGIN_PATH . 'core/loader-core.php'  );