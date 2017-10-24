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

    function addonp_country_tax_label_field(){
   $option = get_option( 'addonp_country_tax_label_field' );
   $countries = array(
		'AF' => 'Afghanistan',
		'AX' => 'Aland Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AS' => 'American Samoa',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua And Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia',
		'BA' => 'Bosnia And Herzegovina',
		'BW' => 'Botswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'BN' => 'Brunei Darussalam',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos (Keeling) Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo',
		'CD' => 'Congo, Democratic Republic',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'CI' => 'Cote D\'Ivoire',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands (Malvinas)',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GU' => 'Guam',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HM' => 'Heard Island & Mcdonald Islands',
		'VA' => 'Holy See (Vatican City State)',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran, Islamic Republic Of',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle Of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KR' => 'Korea',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Lao People\'s Democratic Republic',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libyan Arab Jamahiriya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'Macedonia',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia, Federated States Of',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'AN' => 'Netherlands Antilles',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'MP' => 'Northern Mariana Islands',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestinian Territory, Occupied',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'PR' => 'Puerto Rico',
		'QA' => 'Qatar',
		'RE' => 'Reunion',
		'RO' => 'Romania',
		'RU' => 'Russian Federation',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barthelemy',
		'SH' => 'Saint Helena',
		'KN' => 'Saint Kitts And Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin',
		'PM' => 'Saint Pierre And Miquelon',
		'VC' => 'Saint Vincent And Grenadines',
		'WS' => 'Samoa',
		'SM' => 'San Marino',
		'ST' => 'Sao Tome And Principe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia And Sandwich Isl.',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard And Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syrian Arab Republic',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad And Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks And Caicos Islands',
		'TV' => 'Tuvalu',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UM' => 'United States Outlying Islands',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VE' => 'Venezuela',
		'VN' => 'Viet Nam',
		'VG' => 'Virgin Islands, British',
		'VI' => 'Virgin Islands, U.S.',
		'WF' => 'Wallis And Futuna',
		'EH' => 'Western Sahara',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe',
	);
   ?>
   <select multiple="multiple" id="country_tax" name="addonp_country_tax_label_field[countries][]" class="js-country-tax">
       <?php
		   foreach ( $countries as $code => $country ) { ?>
				<option value="<?php echo $code; ?>" <?php if ( $option == $code ) echo ' selected'; ?>><?php echo $country; ?></option>
			<?php } ?>
    </select>
<?php   }

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
    add_settings_field( 'addonp_country_tax_label_field', __('Country to apply tax', 'addonpayments'), 'addonp_country_tax_label_field', 'addonp-advanced-settings-options', 'addonp-advanced-settings-section' );
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
    register_setting('addonp-advanced-settings-section', 'addonp_country_tax_label_field'                );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_field'                  );
    register_setting('addonp-advanced-settings-section', 'addonp_percent_retention_field'                );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_to_private_field'       );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_to_business_field'      );
    register_setting('addonp-advanced-settings-section', 'addonp_apply_retention_to_self_employed_field' );

    }

    add_action('admin_init', 'display_addonp_advanced_settings_panel_fields');