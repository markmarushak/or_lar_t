<?php

namespace App\Plugins\QformLibrary\Quform;



/**
 * @copyright Copyright (c) 2009-2018 ThemeCatcher (http://www.themecatcher.net)
 */
class Quform_Options
{
    /**
     * The key within the wp_options table
     *
     * @var string
     */
    protected $key = 'quform_options';

    /**
     * The options
     *
     * @var array
     */
    protected $options = array();

    public function __construct()
    {
       // $this->key = $key;
        $this->options =  $this->getDefaults();
       // $this->options = get_option($this->key, $this->getDefaults());
    }

    /**
     * Get the default options
     *
     * @return array
     */
    protected function getDefaults()
    {

        return array(
            'defaultEmailAddress' => 'admin@garasje-tilbud.no',
            'defaultEmailName' => '',
            'defaultFromEmailAddress' => 'wordpress@garasje-tilbud.no',
            'defaultFromEmailName' => '',
            'licenseKey' => '8410ee6e91613df2fd72d0c2db3d6ab15c41a99a3682b028ee0c0515895ee62e',
            'locale' => 'nb',
            'dateFormatJs' => '',
            'timeFormatJs' => '',
            'dateFormat' => '',
            'timeFormat' => '',
            'rtl' => '',
            'recaptchaSiteKey' => '',
            'recaptchaSecretKey' => '',
            'customCss' => '',
            'customCssTablet' => '',
            'customCssPhone' => '',
            'customJs' => '',
            'loadScripts' => 'always',
            'loadScriptsCustom' => array(),
            'disabledStyles' => array(
                'fontAwesome' => false,
                'select2' => false,
                'qtip' => false,
                'fancybox' => false,
                'fancybox2' => false,
                'magnificPopup' => false
            ),
            'disabledScripts' => array(
                'fileUpload' => false,
                'scrollTo' => false,
                'select2' => false,
                'qtip' => false,
                'fancybox' => false,
                'fancybox2' => false,
                'magnificPopup' => false,
                'infieldLabels' => false,
                'datepicker' => false,
                'timepicker' => false
            ),
            'combineCss' => 1,
            'combineJs' => 1,
            'popupEnabled' => 1,
            'popupScript' => 'fancybox-2',
            'rawFix' => false,
            'scrollOffset' => '50',
            'scrollSpeed' => '800',
            'allowAllFileTypes' => false,
            'showEditLink' => 1,
            'csrfProtection' => 1,
            'toolbarMenu' => 1,
            'dashboardWidget' => 1,
            'insertFormButton' => 1,
            'preventFouc' => false,
            'secureApiRequests' => 1,
            'referralEnabled' => false,
            'referralText' => 'Powered by Quform',
            'referralUsername' => '',
            'activeThemes' => array(
                '3' => 'minimal'
            ),
            'activeLocales' => array(
                '1' => Array
                    (
                '0' => 'nb-NO'
                    )),
            'activeDatepickers' => array(),
            'activeTimepickers' => array(),
            'activeEnhancedUploaders' => array(),
            'activeEnhancedSelects' => array(),
            'activeCustomCss' => array(
                '1' => '1'
            ),
            'inactiveCustomCss' => array(),
            'cacheBuster' => time()
        );

//
//        return array(
//            'defaultEmailAddress' => get_bloginfo('admin_email'),
//            'defaultEmailName' => '',
//            'defaultFromEmailAddress' => 'wordpress@' . preg_replace('/^www./', '', Quform::get($_SERVER, 'SERVER_NAME')),
//            'defaultFromEmailName' => get_bloginfo('name'),
//            'licenseKey' => '',
//            'locale' => 'en-US',
//            'dateFormatJs' => '',
//            'timeFormatJs' => '',
//            'dateFormat' => '',
//            'timeFormat' => '',
//            'rtl' => '',
//            'recaptchaSiteKey' => '',
//            'recaptchaSecretKey' => '',
//            'customCss' => '',
//            'customCssTablet' => '',
//            'customCssPhone' => '',
//            'customJs' => '',
//            'loadScripts' => 'always',
//            'loadScriptsCustom' => array(),
//            'disabledStyles' => array(
//                'fontAwesome' => false,
//                'select2' => false,
//                'qtip' => false,
//                'fancybox' => false,
//                'fancybox2' => false,
//                'magnificPopup' => false
//            ),
//            'disabledScripts' => array(
//                'fileUpload' => false,
//                'scrollTo' => false,
//                'select2' => false,
//                'qtip' => false,
//                'fancybox' => false,
//                'fancybox2' => false,
//                'magnificPopup' => false,
//                'infieldLabels' => false,
//                'datepicker' => false,
//                'timepicker' => false
//            ),
//            'combineCss' => true,
//            'combineJs' => true,
//            'popupEnabled' => false,
//            'popupScript' => 'fancybox-2',
//            'rawFix' => false,
//            'scrollOffset' => '50',
//            'scrollSpeed' => '800',
//            'allowAllFileTypes' => false,
//            'showEditLink' => true,
//            'csrfProtection' => true,
//            'toolbarMenu' => true,
//            'dashboardWidget' => true,
//            'insertFormButton' => true,
//            'preventFouc' => false,
//            'secureApiRequests' => true,
//            'referralEnabled' => false,
//            'referralText' => __('Powered by Quform', 'quform'),
//            'referralUsername' => '',
//            'activeThemes' => array(),
//            'activeLocales' => array(),
//            'activeDatepickers' => array(),
//            'activeTimepickers' => array(),
//            'activeEnhancedUploaders' => array(),
//            'activeEnhancedSelects' => array(),
//            'activeCustomCss' => array(),
//            'inactiveCustomCss' => array(),
//            'cacheBuster' => time()
//        );
    }

    /**
     * Save the options
     */
    protected function update()
    {
        update_option($this->key, $this->options);
    }

    /**
     * Get the value opf the option with the given key
     *
     * If it does not exist the given default will be returned
     * If the given default is null it will get the default value for the option
     *
     * @param   string      $key      The option key
     * @param   mixed|null  $default  The default to return if the key does not exist
     * @return  mixed
     */
    public function get($key, $default = null)
    {
        $value = Quform::get($this->options, $key, $default);

        if ($value === null) {
            $value = Quform::get($this->getDefaults(), $key, $default);
        }

        return $value;
    }

    /**
     * Set the value of the option with the given key and save the options
     *
     * @param  string|array  $key
     * @param  null|mixed    $value
     */
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->options[$k] = $v;
            }
        } else {
            $this->options[$key] = $value;
        }

        $this->update();
    }

    /**
     * Formats a date to local time and translates
     *
     * @param   string   $datetime           The datetime string in MySQL format
     * @param   boolean  $hideDateIfSameDay  Hides the date and only shows the time if the date is today
     * @return  string                       The formatted date
     */
    public function formatDate($datetime, $hideDateIfSameDay = false)
    {
        if ( ! strlen($datetime)) {
            return '';
        }

        $datetime = mysql2date('G', $datetime);
        $datetime += get_option('gmt_offset') * 3600;

        $locale = Quform::getLocale($this->get('locale'));

        if ($hideDateIfSameDay && date('Y-m-d', $datetime) == date('Y-m-d')) {
            return date_i18n($locale['timeFormat'], $datetime);
        } else {
            return date_i18n($locale['dateTimeFormat'], $datetime);
        }
    }

    /**
     * Called when the plugin is uninstalled, delete all options
     */
    public function uninstall()
    {
        // Delete options
        delete_option($this->key);
    }
}
