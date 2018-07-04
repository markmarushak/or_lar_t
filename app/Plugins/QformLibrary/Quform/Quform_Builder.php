<?php

namespace App\Plugins\QformLibrary\Quform;

use App\Plugins\QformLibrary\Quform;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Captcha;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Checkbox;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Column;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Date;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Email;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_File;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Group;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Hidden;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Html;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Multiselect;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Name;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Page;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Password;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Radio;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Recaptcha;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Row;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Select;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Submit;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Text;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Textarea;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Time;
use App\Plugins\QformLibrary\Quform\Form\Quform_Form_Factory;


/**
 * @copyright Copyright (c) 2009-2018 ThemeCatcher (http://www.themecatcher.net)
 */
class Quform_Builder
{
    /**
     * @var Quform_Repository
     */
    protected $repository;

    /**
     * @var Quform_Form_Factory
     */
    protected $factory;

    /**
     * @var Quform_Options
     */
    protected $options;

    /**
     * @var Quform_Themes
     */
    protected $themes;

    /**
     * @var Quform_ScriptLoader
     */
    protected $scriptLoader;

    /**
     * @param  Quform_Repository    $repository
     * @param  Quform_Form_Factory  $factory
     * @param  Quform_Options       $options
     * @param  Quform_Themes        $themes
     * @param  Quform_ScriptLoader  $scriptLoader
     */
    public function __construct(Quform_Repository $repository, Quform_Form_Factory $factory, Quform_Options $options,
                                Quform_Themes $themes, Quform_ScriptLoader $scriptLoader)
    {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->options = $options;
        $this->themes = $themes;
        $this->scriptLoader = $scriptLoader;
    }

    /**
     * Get the localisation / variables to pass to the builder JS
     *
     * @return array
     */
    public function getScriptL10n()
    {
        $data = array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'pluginUrl' => Quform::url(),
            'saveFormNonce' => wp_create_nonce('quform_save_form'),
            'formSaved' => __tr('Form saved', 'quform'),
            'confirmRemoveElement' => __tr('Are you sure you want to remove this element? Any previously submitted form data for this element will no longer be accessible.', 'quform'),
            'confirmRemoveGroup' => __tr('Are you sure you want to remove this group? All elements inside this group will also be removed. Any previously submitted form data for elements inside this group will no longer be accessible.', 'quform'),
            'confirmRemovePage' => __tr('Are you sure you want to remove this page? All elements inside this page will also be removed. Any previously submitted form data for elements inside this page will no longer be accessible.', 'quform'),
            'confirmRemoveRow' => __tr('Are you sure you want to remove this row? All elements inside this row will also be removed. Any previously submitted form data for elements inside this row will no longer be accessible.', 'quform'),
            'confirmRemoveColumn' => __tr('Are you sure you want to remove this column? All elements inside this column will also be removed. Any previously submitted form data for elements inside this column will no longer be accessible.', 'quform'),
            'confirmRemoveOptgroup' => __tr('Are you sure you want to remove this optgroup? Any options inside of it will also be removed.', 'quform'),
            'confirmRemoveSubmit' => __tr('Are you sure you want to remove this submit button?', 'quform'),
            'nestingOptgroupError' => __tr('Nested optgroups are not supported.', 'quform'),
            'errorSavingForm' => __tr('Error saving the form', 'quform'),
            'atLeastOneToCcBccRequired' => __tr('At least one To, Cc or Bcc address is required', 'quform'),
            'correctHighlightedFields' => __tr('Please correct the highlighted fields and save the form again', 'quform'),
            'inherit' => __tr('Inherit', 'quform'),
            'field' => __tr('Field', 'quform'),
            'icon' => __tr('Icon', 'quform'),
            'above' => __tr('Above', 'quform'),
            'left' => __tr('Left', 'quform'),
            'inside' => __tr('Inside', 'quform'),
            'atLeastOnePage' => __tr('The form must have at least one page', 'quform'),
            'loadedPreviewLocales' => $this->getLoadedPreviewLocales(),
            'exampleTooltip' => __tr('This is an example tooltip!', 'quform'),
            'remove' => _x('Remove', 'delete', 'quform'),
            'selectOptionHtml' => $this->getOptionHtml('select'),
            'checkboxOptionHtml' => $this->getOptionHtml('checkbox'),
            'radioOptionHtml' => $this->getOptionHtml('radio'),
            'multiselectOptionHtml' => $this->getOptionHtml('multiselect'),
            'optgroupHtml' => $this->getOptgroupHtml(),
            'bulkOptions' => $this->getBulkOptions(),
            'defaultOptions' => $this->getDefaultOptions(),
            'defaultOptgroups' => $this->getDefaultOptgroups(),
            'logicRuleHtml' => $this->getLogicRuleHtml(),
            'noLogicElements' => __tr('There are no elements available to use for logic rules.', 'quform'),
            'noLogicRules' => __tr('There are no logic rules yet, click "Add logic rule" to add one.', 'quform'),
            'logicSourceTypes' => $this->getLogicSourceTypes(),
            'thisFieldMustBePositiveNumberOrZero' => __tr('This field must be a positive number or zero', 'quform'),
            'atLeastOneLogicRuleRequired' => __tr('At least one logic rule is required', 'quform'),
            'showThisGroup' => __tr('Show this group', 'quform'),
            'hideThisGroup' => __tr('Hide this group', 'quform'),
            'showThisField' => __tr('Show this field', 'quform'),
            'hideThisField' => __tr('Hide this field', 'quform'),
            'showThisPage' => __tr('Show this page', 'quform'),
            'hideThisPage' => __tr('Hide this page', 'quform'),
            'useThisConfirmationIfAll' => __tr('Use this confirmation if all of these rules match', 'quform'),
            'useThisConfirmationIfAny' => __tr('Use this confirmation if any of these rules match', 'quform'),
            'sendToTheseRecipientsIfAll' => __tr('Send to these recipients if all of these rules match', 'quform'),
            'sendToTheseRecipientsIfAny' => __tr('Send to these recipients if any of these rules match', 'quform'),
            'ifAllOfTheseRulesMatch' => __tr('if all of these rules match', 'quform'),
            'ifAnyOfTheseRulesMatch' => __tr('if any of these rules match', 'quform'),
            'addRecipient' => __tr('Add recipient', 'quform'),
            'addLogicRule' => __tr('Add logic rule', 'quform'),
            'noConditionals' => __tr('There are no conditionals yet, click "Add conditional" to add one.', 'quform'),
            'is' => __tr('is', 'quform'),
            'isNot' => __tr('is not', 'quform'),
            'isEmpty' => __tr('is empty', 'quform'),
            'isNotEmpty' => __tr('is not empty', 'quform'),
            'greaterThan' => __tr('is greater than', 'quform'),
            'lessThan' => __tr('is less than', 'quform'),
            'contains' => __tr('contains', 'quform'),
            'startsWith' => __tr('starts with', 'quform'),
            'endsWith' => __tr('ends with', 'quform'),
            'enterValue' => __tr('Enter a value', 'quform'),
            'unsavedChanges' => __tr('You have unsaved changes.', 'quform'),
            'previewError' => __tr('An error occurred loading the preview', 'quform'),
            'untitled' =>  __tr('Untitled', 'quform'),
            'pageTabNavHtml' => $this->getPageTabNavHtml(),
            'pageTabNavText' => __tr('Page %s', 'quform'),
            'elements' => $this->getElements(),
            'elementHtml' => $this->getDefaultElementHtml('text'),
            'groupHtml' => $this->getDefaultElementHtml('group'),
            'pageHtml' => $this->getDefaultElementHtml('page'),
            'rowHtml' => $this->getDefaultElementHtml('row'),
            'columnHtml' => $this->getDefaultElementHtml('column'),
            'styles' => $this->getStyles(),
            'styleHtml' => $this->getStyleHtml(),
            'globalStyles' => $this->getGlobalStyles(),
            'globalStyleHtml' => $this->getGlobalStyleHtml(),
            'visibleStyles' => $this->getVisibleStyles(),
            'filters' => $this->getFilters(),
            'filterHtml' => $this->getFilterHtml(),
            'visibleFilters' => $this->getVisibleFilters(),
            'validators' => $this->getValidators(),
            'validatorHtml' => $this->getValidatorHtml(),
            'visibleValidators' => $this->getVisibleValidators(),
            'notification' => Quform_Notification::getDefaultConfig(),
            'notificationHtml' => $this->getNotificationHtml(),
            'notificationConfirmRemove' => __tr('Are you sure you want to remove this notification?', 'quform'),
            'sendThisNotification' => __tr('Send this notification', 'quform'),
            'doNotSendThisNotification' => __tr('Do not send this notification', 'quform'),
            'recipientHtml' => $this->getRecipientHtml(),
            'popupTriggerText' => __tr('Click me', 'quform'),
            'attachmentHtml' => $this->getAttachmentHtml(),
            'selectFiles' => __tr('Select Files', 'quform'),
            'selectElement' => __tr('Select an element', 'quform'),
            'attachmentSourceTypes' => $this->getAttachmentSourceTypes(),
            'noAttachmentSourcesFound' => __tr('No attachment sources found', 'quform'),
            'noAttachments' => __tr('There are no attachments yet, click "Add attachment" to add one.', 'quform'),
            'selectOneFile' => __tr('Select at least one file', 'quform'),
            'confirmation' => Quform_Confirmation::getDefaultConfig(),
            'confirmationHtml' => $this->getConfirmationHtml(),
            'cannotRemoveDefaultConfirmation' => __tr('The default confirmation cannot be removed', 'quform'),
            'confirmationConfirmRemove' => __tr('Are you sure you want to remove this confirmation?', 'quform'),
            'dbPasswordHtml' => $this->getDbPasswordHtml(),
            'dbColumnHtml' => $this->getDbColumnHtml(),
            'areYouSure' => __tr('Are you sure?', 'quform'),
            'emailRemoveBrackets' => __tr('Please remove the brackets from the email address', 'quform'),
            'themes' => $this->getThemes(),
            'collapse' => __tr('Collapse', 'quform'),
            'expand' => __tr('Expand', 'quform'),
            'noIcon' => __tr('No icon', 'quform'),
            'columnNumber' => __tr('Column %d', 'quform'),
            'columnWidthMustBeNumeric' => __tr('Column width must be numeric', 'quform'),
            'columnWidthTotalTooHigh' => __tr('Total of column widths must not be higher than 100', 'quform'),
            'pageSettings' => __tr('Page settings', 'quform'),
            'groupSettings' => __tr('Group settings', 'quform'),
            'rowSettings' => __tr('Row settings', 'quform'),
            'elementSettings' => __tr('Element settings', 'quform'),
            'pleaseSelect' => __tr('Please select', 'quform'),
            'buttonIcon' => __tr('Button icon', 'quform'),
            'buttonIconPosition' => __tr('Button icon position', 'quform'),
            'dropzoneIcon' => __tr('Dropzone icon', 'quform'),
            'dropzoneIconPosition' => __tr('Dropzone icon position', 'quform'),
            'posts' => array_merge(Quform::getPosts(), Quform::getPages()),
            'displayAMessage' => __tr('Display a message', 'quform'),
            'redirectTo' => __tr('Redirect to', 'quform'),
            'reloadThePage' => __tr('Reload the page', 'quform'),
            'enableCustomizeValuesToChange' => __tr('Enable the "Customize values" setting to change the value', 'quform'),
            'everyone' => __tr('Everyone', 'quform'),
            'adminOnly' => __tr('Admin only', 'quform'),
            'loggedInUsersOnly' => __tr('Logged in users only', 'quform'),
            'loggedOutUsersOnly' => __tr('Logged out users only', 'quform')
        );

        $params = array(
            'l10n_print_after' => 'quformBuilderL10n = ' . wp_json_encode($data)
        );

        return $params;
    }

    /**
     * Get the HTML for an option for a select element
     *
     * @param   string  $type  The element type, 'select', 'radio', 'checkbox' or 'multiselect'
     * @return  string
     */
    protected function getOptionHtml($type)
    {
        $output = sprintf('<div class="qfb-option qfb-option-type-%s qfb-box qfb-cf">', $type);

        $output .= '<div class="qfb-option-left"><div class="qfb-option-left-inner">';
        $output .= '<div class="qfb-settings-row qfb-settings-row-2">';
        $output .= '<div class="qfb-settings-column">';
        $output .= sprintf('<input class="qfb-option-label" type="text" placeholder="%s">', esc_attr__('Label', 'quform'));
        $output .= '</div>';
        $output .= '<div class="qfb-settings-column">';
        $output .= sprintf('<input class="qfb-option-value" type="text" placeholder="%s">', esc_attr__('Value', 'quform'));
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div></div>';

        $output .= '<div class="qfb-option-right">';

        $output .= '<div class="qfb-option-actions">';

        $output .= sprintf('<span class="qfb-option-action-set-default" title="%s"><i class="fa fa-check"></i></span>', esc_attr__('Default value', 'quform'));
        $output .= '<span class="qfb-option-action-add"><i class="fa fa-plus"></i></span>';
        $output .= '<span class="qfb-option-action-duplicate"><i class="mdi mdi-content_copy"></i></span>';
        $output .= '<span class="qfb-option-action-remove"><i class="fa fa-trash"></i></span>';
        if ($type == 'radio' || $type == 'checkbox') {
            $output .= '<span class="qfb-option-action-settings"><i class="mdi mdi-settings"></i></span>';
        }
        $output .= '<span class="qfb-option-action-move"><i class="fa fa-arrows"></i></span>';

        $output .= '</div>';
        $output .= '</div>';

        $output .= '</div>';

        return $output;
    }

    /**
     * Get the HTML for an optgroup for a select element
     *
     * @return  string
     */
    protected function getOptgroupHtml()
    {
        $output = '<div class="qfb-optgroup qfb-box qfb-cf"><div class="qfb-optgroup-top qfb-cf">';
        $output .= '<div class="qfb-optgroup-left"><div class="qfb-optgroup-left-inner">';
        $output .= sprintf('<input class="qfb-optgroup-label" type="text" placeholder="%s">', esc_attr__('Optgroup label', 'quform'));
        $output .= '</div></div>';
        $output .= '<div class="qfb-optgroup-right">';
        $output .= '<div class="qfb-optgroup-actions">';
        $output .= '<span class="qfb-optgroup-action-add"><i class="fa fa-plus"></i></span>';
        $output .= '<span class="qfb-optgroup-action-remove"><i class="fa fa-trash"></i></span>';
        $output .= '<span class="qfb-optgroup-action-move"><i class="fa fa-arrows"></i></span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div></div>';

        return $output;
    }

    /**
     * Get the default option config for each element type
     *
     * @return array
     */
    protected function getDefaultOptions()
    {
        return array(
            'select' => Quform_Element_Select::getDefaultOptionConfig(),
            'checkbox' => Quform_Element_Checkbox::getDefaultOptionConfig(),
            'radio' => Quform_Element_Radio::getDefaultOptionConfig(),
            'multiselect' => Quform_Element_Multiselect::getDefaultOptionConfig()
        );
    }

    /**
     * Get the default optgroup config for each element type
     *
     * @return array
     */
    protected function getDefaultOptgroups()
    {
        return array(
            'select' => Quform_Element_Select::getDefaultOptgroupConfig(),
            'multiselect' => Quform_Element_Multiselect::getDefaultOptgroupConfig()
        );
    }

    /*
     * Get the predefined bulk options
     *
     * @return array
     */
    public function getBulkOptions()
    {
        return apply_filters('quform_bulk_options', array(
            'countries' => array(
                'name' => __tr('Countries', 'quform'),
                'options' => $this->getCountries()
            ),
            'usStates' => array(
                'name' => __tr('U.S. States', 'quform'),
                'options' => $this->getUsStates()
            ),
            'canadianProvinces' => array(
                'name' => __tr('Canadian Provinces', 'quform'),
                'options' => $this->getCanadianProvinces()
            ),
            'ukCounties' => array(
                'name' => __tr('UK Counties', 'quform'),
                'options' => $this->getUkCounties()
            ),
            'germanStates' => array(
                'name' => __tr('German States', 'quform'),
                'options' => array('Baden-Wurttemberg', 'Bavaria', 'Berlin', 'Brandenburg', 'Bremen', 'Hamburg', 'Hesse', 'Mecklenburg-West Pomerania', 'Lower Saxony', 'North Rhine-Westphalia', 'Rhineland-Palatinate', 'Saarland', 'Saxony', 'Saxony-Anhalt', 'Schleswig-Holstein', 'Thuringia')
            ),
            'dutchProvinces' => array(
                'name' => __tr('Dutch Provinces', 'quform'),
                'options' => array('Drente', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen', 'Limburg', 'Noord-Brabant', 'Noord-Holland', 'Overijssel', 'Zuid-Holland', 'Utrecht', 'Zeeland')
            ),
            'continents' => array(
                'name' => __tr('Continents', 'quform'),
                'options' => array(__tr('Africa', 'quform'), __tr('Antarctica', 'quform'), __tr('Asia', 'quform'), __tr('Australia', 'quform'), __tr('Europe', 'quform'), __tr('North America', 'quform'), __tr('South America', 'quform'))
            ),
            'gender' => array(
                'name' => __tr('Gender', 'quform'),
                'options' => array(__tr('Male', 'quform'), __tr('Female', 'quform'))
            ),
            'age' => array(
                'name' => __tr('Age', 'quform'),
                'options' => array(__tr('Under 18', 'quform'), __tr('18-24', 'quform'), __tr('25-34', 'quform'), __tr('35-44', 'quform'), __tr('45-54', 'quform'), __tr('55-64', 'quform'), __tr('65 or over', 'quform'))
            ),
            'maritalStatus' => array(
                'name' => __tr('Marital Status', 'quform'),
                'options' => array(__tr('Single', 'quform'), __tr('Married', 'quform'), __tr('Divorced', 'quform'), __tr('Widowed', 'quform'))
            ),
            'income' => array(
                'name' => __tr('Income', 'quform'),
                'options' => array(__tr('Under $20,000', 'quform'), __tr('$20,000 - $30,000', 'quform'), __tr('$30,000 - $40,000', 'quform'), __tr('$40,000 - $50,000', 'quform'), __tr('$50,000 - $75,000', 'quform'), __tr('$75,000 - $100,000', 'quform'), __tr('$100,000 - $150,000', 'quform'), __tr('$150,000 or more', 'quform'))
            ),
            'days' => array(
                'name' => __tr('Days', 'quform'),
                'options' => array(__tr('Monday', 'quform'), __tr('Tuesday', 'quform'), __tr('Wednesday', 'quform'), __tr('Thursday', 'quform'), __tr('Friday', 'quform'), __tr('Saturday', 'quform'), __tr('Sunday', 'quform'))
            ),
            'months' => array(
                'name' => __tr('Months', 'quform'),
                'options' => array_values($this->getAllMonths())
            )
        ));
    }

    /**
     * Returns an array of all countries
     *
     * @return array
     */
    protected function getCountries()
    {
        return apply_filters('quform_countries', array(
            __tr('Afghanistan', 'quform'), __tr('Albania', 'quform'), __tr('Algeria', 'quform'), __tr('American Samoa', 'quform'), __tr('Andorra', 'quform'), __tr('Angola', 'quform'), __tr('Anguilla', 'quform'), __tr('Antarctica', 'quform'), __tr('Antigua And Barbuda', 'quform'), __tr('Argentina', 'quform'), __tr('Armenia', 'quform'), __tr('Aruba', 'quform'), __tr('Australia', 'quform'), __tr('Austria', 'quform'), __tr('Azerbaijan', 'quform'), __tr('Bahamas', 'quform'), __tr('Bahrain', 'quform'), __tr('Bangladesh', 'quform'), __tr('Barbados', 'quform'), __tr('Belarus', 'quform'), __tr('Belgium', 'quform'),
            __tr('Belize', 'quform'), __tr('Benin', 'quform'), __tr('Bermuda', 'quform'), __tr('Bhutan', 'quform'), __tr('Bolivia', 'quform'), __tr('Bosnia And Herzegovina', 'quform'), __tr('Botswana', 'quform'), __tr('Bouvet Island', 'quform'), __tr('Brazil', 'quform'), __tr('British Indian Ocean Territory', 'quform'), __tr('Brunei Darussalam', 'quform'), __tr('Bulgaria', 'quform'), __tr('Burkina Faso', 'quform'), __tr('Burundi', 'quform'), __tr('Cambodia', 'quform'), __tr('Cameroon', 'quform'), __tr('Canada', 'quform'), __tr('Cape Verde', 'quform'), __tr('Cayman Islands', 'quform'), __tr('Central African Republic', 'quform'), __tr('Chad', 'quform'),
            __tr('Chile', 'quform'), __tr('China', 'quform'), __tr('Christmas Island', 'quform'), __tr('Cocos (Keeling) Islands', 'quform'), __tr('Colombia', 'quform'), __tr('Comoros', 'quform'), __tr('Congo', 'quform'), __tr('Congo, The Democratic Republic Of The', 'quform'), __tr('Cook Islands', 'quform'), __tr('Costa Rica', 'quform'), __tr('Cote D\'Ivoire', 'quform'), __tr('Croatia (Local Name: Hrvatska)', 'quform'), __tr('Cuba', 'quform'), __tr('Cyprus', 'quform'), __tr('Czech Republic', 'quform'), __tr('Denmark', 'quform'), __tr('Djibouti', 'quform'), __tr('Dominica', 'quform'), __tr('Dominican Republic', 'quform'), __tr('East Timor', 'quform'), __tr('Ecuador', 'quform'),
            __tr('Egypt', 'quform'), __tr('El Salvador', 'quform'), __tr('Equatorial Guinea', 'quform'), __tr('Eritrea', 'quform'), __tr('Estonia', 'quform'), __tr('Ethiopia', 'quform'), __tr('Falkland Islands (Malvinas)', 'quform'), __tr('Faroe Islands', 'quform'), __tr('Fiji', 'quform'), __tr('Finland', 'quform'), __tr('France', 'quform'), __tr('France, Metropolitan', 'quform'), __tr('French Guiana', 'quform'), __tr('French Polynesia', 'quform'), __tr('French Southern Territories', 'quform'), __tr('Gabon', 'quform'), __tr('Gambia', 'quform'), __tr('Georgia', 'quform'), __tr('Germany', 'quform'), __tr('Ghana', 'quform'), __tr('Gibraltar', 'quform'),
            __tr('Greece', 'quform'), __tr('Greenland', 'quform'), __tr('Grenada', 'quform'), __tr('Guadeloupe', 'quform'), __tr('Guam', 'quform'), __tr('Guatemala', 'quform'), __tr('Guinea', 'quform'), __tr('Guinea-Bissau', 'quform'), __tr('Guyana', 'quform'), __tr('Haiti', 'quform'), __tr('Heard And Mc Donald Islands', 'quform'), __tr('Holy See (Vatican City State)', 'quform'), __tr('Honduras', 'quform'), __tr('Hong Kong', 'quform'), __tr('Hungary', 'quform'), __tr('Iceland', 'quform'), __tr('India', 'quform'), __tr('Indonesia', 'quform'), __tr('Iran (Islamic Republic Of)', 'quform'), __tr('Iraq', 'quform'), __tr('Ireland', 'quform'),
            __tr('Israel', 'quform'), __tr('Italy', 'quform'), __tr('Jamaica', 'quform'), __tr('Japan', 'quform'), __tr('Jordan', 'quform'), __tr('Kazakhstan', 'quform'), __tr('Kenya', 'quform'), __tr('Kiribati', 'quform'), __tr('Korea, Democratic People\'s Republic Of', 'quform'), __tr('Korea, Republic Of', 'quform'), __tr('Kuwait', 'quform'), __tr('Kyrgyzstan', 'quform'), __tr('Lao People\'s Democratic Republic', 'quform'), __tr('Latvia', 'quform'), __tr('Lebanon', 'quform'), __tr('Lesotho', 'quform'), __tr('Liberia', 'quform'), __tr('Libyan Arab Jamahiriya', 'quform'), __tr('Liechtenstein', 'quform'), __tr('Lithuania', 'quform'), __tr('Luxembourg', 'quform'),
            __tr('Macau', 'quform'), __tr('Macedonia, Former Yugoslav Republic Of', 'quform'), __tr('Madagascar', 'quform'), __tr('Malawi', 'quform'), __tr('Malaysia', 'quform'), __tr('Maldives', 'quform'), __tr('Mali', 'quform'), __tr('Malta', 'quform'), __tr('Marshall Islands', 'quform'), __tr('Martinique', 'quform'), __tr('Mauritania', 'quform'), __tr('Mauritius', 'quform'), __tr('Mayotte', 'quform'), __tr('Mexico', 'quform'), __tr('Micronesia, Federated States Of', 'quform'), __tr('Moldova, Republic Of', 'quform'), __tr('Monaco', 'quform'), __tr('Mongolia', 'quform'), __tr('Montserrat', 'quform'), __tr('Morocco', 'quform'), __tr('Mozambique', 'quform'),
            __tr('Myanmar', 'quform'), __tr('Namibia', 'quform'), __tr('Nauru', 'quform'), __tr('Nepal', 'quform'), __tr('Netherlands', 'quform'), __tr('Netherlands Antilles', 'quform'), __tr('New Caledonia', 'quform'), __tr('New Zealand', 'quform'), __tr('Nicaragua', 'quform'), __tr('Niger', 'quform'), __tr('Nigeria', 'quform'), __tr('Niue', 'quform'), __tr('Norfolk Island', 'quform'), __tr('Northern Mariana Islands', 'quform'), __tr('Norway', 'quform'), __tr('Oman', 'quform'), __tr('Pakistan', 'quform'), __tr('Palau', 'quform'), __tr('Panama', 'quform'), __tr('Papua New Guinea', 'quform'), __tr('Paraguay', 'quform'),
            __tr('Peru', 'quform'), __tr('Philippines', 'quform'), __tr('Pitcairn', 'quform'), __tr('Poland', 'quform'), __tr('Portugal', 'quform'), __tr('Puerto Rico', 'quform'), __tr('Qatar', 'quform'), __tr('Reunion', 'quform'), __tr('Romania', 'quform'), __tr('Russian Federation', 'quform'), __tr('Rwanda', 'quform'), __tr('Saint Kitts And Nevis', 'quform'), __tr('Saint Lucia', 'quform'), __tr('Saint Vincent And The Grenadines', 'quform'), __tr('Samoa', 'quform'), __tr('San Marino', 'quform'), __tr('Sao Tome And Principe', 'quform'), __tr('Saudi Arabia', 'quform'), __tr('Senegal', 'quform'), __tr('Seychelles', 'quform'), __tr('Sierra Leone', 'quform'),
            __tr('Singapore', 'quform'), __tr('Slovakia (Slovak Republic)', 'quform'), __tr('Slovenia', 'quform'), __tr('Solomon Islands', 'quform'), __tr('Somalia', 'quform'), __tr('South Africa', 'quform'), __tr('South Georgia, South Sandwich Islands', 'quform'), __tr('Spain', 'quform'), __tr('Sri Lanka', 'quform'), __tr('St. Helena', 'quform'), __tr('St. Pierre And Miquelon', 'quform'), __tr('Sudan', 'quform'), __tr('Suriname', 'quform'), __tr('Svalbard And Jan Mayen Islands', 'quform'), __tr('Swaziland', 'quform'), __tr('Sweden', 'quform'), __tr('Switzerland', 'quform'), __tr('Syrian Arab Republic', 'quform'), __tr('Taiwan', 'quform'), __tr('Tajikistan', 'quform'), __tr('Tanzania, United Republic Of', 'quform'),
            __tr('Thailand', 'quform'), __tr('Togo', 'quform'), __tr('Tokelau', 'quform'), __tr('Tonga', 'quform'), __tr('Trinidad And Tobago', 'quform'), __tr('Tunisia', 'quform'), __tr('Turkey', 'quform'), __tr('Turkmenistan', 'quform'), __tr('Turks And Caicos Islands', 'quform'), __tr('Tuvalu', 'quform'), __tr('Uganda', 'quform'), __tr('Ukraine', 'quform'), __tr('United Arab Emirates', 'quform'), __tr('United Kingdom', 'quform'), __tr('United States', 'quform'), __tr('United States Minor Outlying Islands', 'quform'), __tr('Uruguay', 'quform'), __tr('Uzbekistan', 'quform'), __tr('Vanuatu', 'quform'), __tr('Venezuela', 'quform'), __tr('Vietnam', 'quform'),
            __tr('Virgin Islands (British)', 'quform'), __tr('Virgin Islands (U.S.)', 'quform'), __tr('Wallis And Futuna Islands', 'quform'), __tr('Western Sahara', 'quform'), __tr('Yemen', 'quform'), __tr('Yugoslavia', 'quform'), __tr('Zambia', 'quform'), __tr('Zimbabwe', 'quform')
        ));
    }

    /**
     * Returns an array of US states
     *
     * @return array
     */
    protected function getUsStates()
    {
        return array(
            'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware',
            'District Of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas',
            'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi',
            'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
            'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
            'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington',
            'West Virginia', 'Wisconsin', 'Wyoming'
        );
    }

    /**
     * Returns an array of Canadian Provinces / Territories
     *
     * @return array
     */
    protected function getCanadianProvinces()
    {
        return array(
            'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland & Labrador',
            'Northwest Territories', 'Nova Scotia', 'Nunavut','Ontario', 'Prince Edward Island', 'Quebec',
            'Saskatchewan', 'Yukon'
        );
    }

    /**
     * Returns an array of UK counties
     *
     * @return array
     */
    protected function getUkCounties()
    {
        return array(
            'Aberdeen City', 'Aberdeenshire', 'Angus', 'Antrim', 'Argyll and Bute', 'Armagh', 'Avon', 'Banffshire',
            'Bedfordshire', 'Berkshire', 'Blaenau Gwent', 'Borders', 'Bridgend', 'Bristol', 'Buckinghamshire',
            'Caerphilly', 'Cambridgeshire', 'Cardiff', 'Carmarthenshire', 'Ceredigion', 'Channel Islands', 'Cheshire',
            'Clackmannan', 'Cleveland', 'Conwy', 'Cornwall', 'Cumbria', 'Denbighshire', 'Derbyshire', 'Devon', 'Dorset',
            'Down', 'Dumfries and Galloway', 'Durham', 'East Ayrshire', 'East Dunbartonshire', 'East Lothian',
            'East Renfrewshire', 'East Riding of Yorkshire', 'East Sussex', 'Edinburgh City', 'Essex', 'Falkirk',
            'Fermanagh', 'Fife', 'Flintshire', 'Glasgow (City of)', 'Gloucestershire', 'Greater Manchester', 'Gwynedd',
            'Hampshire', 'Herefordshire', 'Hertfordshire', 'Highland', 'Humberside', 'Inverclyde', 'Isle of Anglesey',
            'Isle of Man', 'Isle of Wight', 'Isles of Scilly', 'Kent', 'Lancashire', 'Leicestershire', 'Lincolnshire',
            'London', 'Londonderry', 'Merseyside', 'Merthyr Tydfil', 'Middlesex', 'Midlothian', 'Monmouthshire',
            'Moray', 'Neath Port Talbot', 'Newport', 'Norfolk', 'North Ayrshire', 'North East Lincolnshire',
            'North Lanarkshire', 'North Yorkshire', 'Northamptonshire', 'Northumberland', 'Nottinghamshire',
            'Orkney', 'Oxfordshire', 'Pembrokeshire', 'Perthshire and Kinross', 'Powys', 'Renfrewshire',
            'Rhondda Cynon Taff', 'Roxburghshire', 'Rutland', 'Shetland', 'Shropshire', 'Somerset', 'South Ayrshire',
            'South Lanarkshire', 'South Yorkshire', 'Staffordshire', 'Stirling', 'Suffolk', 'Surrey', 'Swansea',
            'The Vale of Glamorgan', 'Torfaen', 'Tyne and Wear', 'Tyrone', 'Warwickshire', 'West Dunbartonshire',
            'West Lothian', 'West Midlands', 'West Sussex', 'West Yorkshire', 'Western Isles', 'Wiltshire',
            'Worcestershire', 'Wrexham'
        );
    }

    /**
     * Get all the months in the year
     *
     * @return array
     */
    protected function getAllMonths()
    {
        return apply_filters('quform_get_all_months', array(
            1  => __tr('January', 'quform'),
            2  => __tr('February', 'quform'),
            3  => __tr('March', 'quform'),
            4  => __tr('April', 'quform'),
            5  => __tr('May', 'quform'),
            6  => __tr('June', 'quform'),
            7  => __tr('July', 'quform'),
            8  => __tr('August', 'quform'),
            9  => __tr('September', 'quform'),
            10 => __tr('October', 'quform'),
            11 => __tr('November', 'quform'),
            12 => __tr('December', 'quform')
        ));
    }

    /**
     * Get the core form elements config
     *
     * @param   string|null  $type  The element type or null for all elements
     * @return  array
     */
    public function getElements($type = null)
    {
        $elements = array(
            'text' => array(
                'name' => _x('Text', 'text input field', 'quform'),
                'icon' => '<i class="fa fa-pencil"></i>',
                'config' => Quform_Element_Text::getDefaultConfig()
            ),
            'textarea' => array(
                'name' => _x('Textarea', 'textarea input field', 'quform'),
                'icon' => '<i class="fa fa-align-left"></i>',
                'config' => Quform_Element_Textarea::getDefaultConfig()
            ),
            'email' => array(
                'name' => _x('Email', 'email address field', 'quform'),
                'icon' => '<i class="fa fa-envelope"></i>',
                'config' => Quform_Element_Email::getDefaultConfig()
            ),
            'select' => array(
                'name' => _x('Select Menu', 'select menu field', 'quform'),
                'icon' => '<i class="fa fa-caret-square-o-down"></i>',
                'config' => Quform_Element_Select::getDefaultConfig()
            ),
            'checkbox' => array(
                'name' => _x('Checkboxes', 'checkboxes field', 'quform'),
                'icon' => '<i class="fa fa-check-square-o"></i>',
                'config' => Quform_Element_Checkbox::getDefaultConfig()
            ),
            'radio' => array(
                'name' => _x('Radio Buttons', 'radio buttons field', 'quform'),
                'icon' => '<i class="mdi mdi-radio_button_checked"></i>',
                'config' => Quform_Element_Radio::getDefaultConfig()
            ),
            'multiselect' => array(
                'name' => _x('Multi Select', 'multi select field', 'quform'),
                'icon' => '<i class="fa fa-list-ul"></i>',
                'config' => Quform_Element_Multiselect::getDefaultConfig()
            ),
            'file' => array(
                'name' => __tr('File Upload', 'quform'),
                'icon' => '<i class="fa fa-upload"></i>',
                'config' => Quform_Element_File::getDefaultConfig()
            ),
            'date' => array(
                'name' => _x('Date', 'date field', 'quform'),
                'icon' => '<i class="fa fa-calendar"></i>',
                'config' => Quform_Element_Date::getDefaultConfig()
            ),
            'time' => array(
                'name' => _x('Time', 'time field', 'quform'),
                'icon' => '<i class="fa fa-clock-o"></i>',
                'config' => Quform_Element_Time::getDefaultConfig()
            ),
            'name' => array(
                'name' => _x('Name', 'name field', 'quform'),
                'icon' => '<i class="fa fa-user"></i>',
                'config' => Quform_Element_Name::getDefaultConfig()
            ),
            'password' => array(
                'name' => _x('Password', 'password input field', 'quform'),
                'icon' => '<i class="fa fa-lock"></i>',
                'config' => Quform_Element_Password::getDefaultConfig()
            ),
            'html' => array(
                'name' => __tr('HTML', 'quform'),
                'icon' => '<i class="fa fa-code"></i>',
                'config' => Quform_Element_Html::getDefaultConfig()
            ),
            'hidden' => array(
                'name' => __tr('Hidden', 'quform'),
                'icon' => '<i class="fa fa-eye-slash"></i>',
                'config' => Quform_Element_Hidden::getDefaultConfig()
            ),
            'captcha' => array(
                'name' => _x('CAPTCHA', 'captcha field', 'quform'),
                'icon' => '<i class="fa fa-handshake-o"></i>',
                'config' => Quform_Element_Captcha::getDefaultConfig()
            ),
            'recaptcha' => array(
                'name' => __tr('reCAPTCHA', 'quform'),
                'icon' => '<i class="mdi mdi-face"></i>',
                'config' => Quform_Element_Recaptcha::getDefaultConfig()
            ),
            'submit' => array(
                'name' => _x('Submit', 'submit button element', 'quform'),
                'icon' => '<i class="fa fa-paper-plane"></i>',
                'config' => Quform_Element_Submit::getDefaultConfig()
            ),
            'page' => array(
                'name' => __tr('Page', 'quform'),
                'icon' => '<i class="fa fa-file-o"></i>',
                'config' => Quform_Element_Page::getDefaultConfig()
            ),
            'group' => array(
                'name' => __tr('Group', 'quform'),
                'icon' => '<i class="fa fa-object-group"></i>',
                'config' => Quform_Element_Group::getDefaultConfig()
            ),
            'row' => array(
                'name' => __tr('Column Layout', 'quform'),
                'icon' => '<i class="fa fa-columns"></i>',
                'config' => Quform_Element_Row::getDefaultConfig()
            ),
            'column' => array(
                'name' => __tr('Column', 'quform'),
                'icon' => '<i class="fa fa-columns"></i>',
                'config' => Quform_Element_Column::getDefaultConfig()
            )
        );

        $elements = apply_filters('quform_admin_elements', $elements);

        if (is_string($type) && isset($elements[$type])) {
            return $elements[$type];
        }

        return $elements;
    }

    /**
     * Get the default config for the element of the given type
     *
     * @param   string  $type  The element type
     * @return  array          The default element config
     */
    protected function getDefaultElementConfig($type)
    {
        $element = $this->getElements($type);

        return $element['config'];
    }

    /**
     * Get the element styles data
     *
     * @return array
     */
    public function getStyles()
    {
        $styles = array(
            'element' => array('name' => __tr('Outer wrapper', 'quform')),
            'elementLabel' => array('name' => __tr('Label', 'quform')),
            'elementLabelText' => array('name' => __tr('Label text', 'quform')),
            'elementRequiredText' => array('name' => __tr('Element required text', 'quform')),
            'elementInner' => array('name' => __tr('Inner wrapper', 'quform')),
            'elementInput' => array('name' => __tr('Input wrapper', 'quform')),
            'elementText' => array('name' => __tr('Text input field', 'quform')),
            'elementTextHover' => array('name' => __tr('Text input field (hover)', 'quform')),
            'elementTextFocus' => array('name' => __tr('Text input field (focus)', 'quform')),
            'elementTextarea' => array('name' => __tr('Textarea field', 'quform')),
            'elementTextareaHover' => array('name' => __tr('Textarea field (hover)', 'quform')),
            'elementTextareaFocus' => array('name' => __tr('Textarea field (focus)', 'quform')),
            'elementSelect' => array('name' => __tr('Select field', 'quform')),
            'elementSelectHover' => array('name' => __tr('Select field (hover)', 'quform')),
            'elementSelectFocus' => array('name' => __tr('Select field (focus)', 'quform')),
            'elementIcon' => array('name' => __tr('Text input icons', 'quform')),
            'elementIconHover' => array('name' => __tr('Text input icons (hover)', 'quform')),
            'elementSubLabel' => array('name' => __tr('Sub label', 'quform')),
            'elementDescription' => array('name' => __tr('Description', 'quform')),
            'options' => array('name' => __tr('Options outer wrapper', 'quform')),
            'option' => array('name' => __tr('Option wrapper', 'quform')),
            'optionRadioButton' => array('name' => __tr('Option radio button', 'quform')),
            'optionCheckbox' => array('name' => __tr('Option checkbox', 'quform')),
            'optionLabel' => array('name' => __tr('Option label', 'quform')),
            'optionLabelSelected' => array('name' => __tr('Option label (when selected)', 'quform')),
            'optionIcon' => array('name' => __tr('Option icon', 'quform')),
            'optionIconSelected' => array('name' => __tr('Option icon (when selected)', 'quform')),
            'optionText' => array('name' => __tr('Option text', 'quform')),
            'optionTextSelected' => array('name' => __tr('Option text (when selected)', 'quform')),
            'page' => array('name' => __tr('Page wrapper', 'quform')),
            'pageTitle' => array('name' => __tr('Page title', 'quform')),
            'pageDescription' => array('name' => __tr('Page description', 'quform')),
            'pageElements' => array('name' => __tr('Page elements wrapper', 'quform')),
            'group' => array('name' => __tr('Group wrapper', 'quform')),
            'groupTitle' => array('name' => __tr('Group title', 'quform')),
            'groupDescription' => array('name' => __tr('Group description', 'quform')),
            'groupElements' => array('name' => __tr('Group elements wrapper', 'quform')),
            'submit' => array('name' => __tr('Submit button outer wrapper', 'quform')),
            'submitInner' => array('name' => __tr('Submit button inner wrapper', 'quform')),
            'submitButton' => array('name' => __tr('Submit button', 'quform')),
            'submitButtonHover' => array('name' => __tr('Submit button (hover)', 'quform')),
            'submitButtonActive' => array('name' => __tr('Submit button (active)', 'quform')),
            'submitButtonText' => array('name' => __tr('Submit button text', 'quform')),
            'submitButtonTextHover' => array('name' => __tr('Submit button text (hover)', 'quform')),
            'submitButtonTextActive' => array('name' => __tr('Submit button text (active)', 'quform')),
            'submitButtonIcon' => array('name' => __tr('Submit button icon', 'quform')),
            'submitButtonIconHover' => array('name' => __tr('Submit button icon (hover)', 'quform')),
            'submitButtonIconActive' => array('name' => __tr('Submit button icon (active)', 'quform')),
            'backInner' => array('name' => __tr('Back button inner wrapper', 'quform')),
            'backButton' => array('name' => __tr('Back button', 'quform')),
            'backButtonHover' => array('name' => __tr('Back button (hover)', 'quform')),
            'backButtonActive' => array('name' => __tr('Back button (active)', 'quform')),
            'backButtonText' => array('name' => __tr('Back button text', 'quform')),
            'backButtonTextHover' => array('name' => __tr('Back button text (hover)', 'quform')),
            'backButtonTextActive' => array('name' => __tr('Back button text (active)', 'quform')),
            'backButtonIcon' => array('name' => __tr('Back button icon', 'quform')),
            'backButtonIconHover' => array('name' => __tr('Back button icon (hover)', 'quform')),
            'backButtonIconActive' => array('name' => __tr('Back button icon (active)', 'quform')),
            'uploadButton' => array('name' => __tr('Upload button', 'quform')),
            'uploadButtonHover' => array('name' => __tr('Upload button (hover)', 'quform')),
            'uploadButtonActive' => array('name' => __tr('Upload button (active)', 'quform')),
            'uploadButtonText' => array('name' => __tr('Upload button text', 'quform')),
            'uploadButtonTextHover' => array('name' => __tr('Upload button text (hover)', 'quform')),
            'uploadButtonTextActive' => array('name' => __tr('Upload button text (active)', 'quform')),
            'uploadButtonIcon' => array('name' => __tr('Upload button icon', 'quform')),
            'uploadButtonIconHover' => array('name' => __tr('Upload button icon (hover)', 'quform')),
            'uploadButtonIconActive' => array('name' => __tr('Upload button icon (active)', 'quform')),
            'datepickerHeader' => array('name' => __tr('Datepicker header', 'quform')),
            'datepickerHeaderText' => array('name' => __tr('Datepicker header text', 'quform')),
            'datepickerHeaderTextHover' => array('name' => __tr('Datepicker header text (hover)', 'quform')),
            'datepickerFooter' => array('name' => __tr('Datepicker footer', 'quform')),
            'datepickerFooterText' => array('name' => __tr('Datepicker footer text', 'quform')),
            'datepickerFooterTextHover' => array('name' => __tr('Datepicker footer text (hover)', 'quform')),
            'datepickerSelection' => array('name' => __tr('Datepicker selection', 'quform')),
            'datepickerSelectionActive' => array('name' => __tr('Datepicker selection (chosen)', 'quform')),
            'datepickerSelectionText' => array('name' => __tr('Datepicker selection text', 'quform')),
            'datepickerSelectionTextHover' => array('name' => __tr('Datepicker selection text (hover)', 'quform')),
            'datepickerSelectionActiveText' => array('name' => __tr('Datepicker selection text (active)', 'quform')),
            'datepickerSelectionActiveTextHover' => array('name' => __tr('Datepicker selection text (chosen) (hover)', 'quform'))
        );

        foreach ($styles as $key => $style) {
            $styles[$key]['config'] = array('type' => $key, 'css' => '');
        }

        return apply_filters('quform_admin_styles', $styles);
    }

    /**
     * Get all available global styles
     *
     * @param  string  $key  Only get the style with this key
     * @return array
     */
    public function getGlobalStyles($key = null)
    {
        $styles = array(
            'formOuter' => array('name' => _x('Form outer wrapper', 'the outermost HTML wrapper around the form', 'quform')),
            'formInner' => array('name' => _x('Form inner wrapper', 'the inner HTML wrapper around the form', 'quform')),
            'formSuccess' => array('name' => __tr('Success message', 'quform')),
            'formSuccessIcon' => array('name' => __tr('Success message icon', 'quform')),
            'formSuccessContent' => array('name' => __tr('Success message content', 'quform')),
            'formTitle' => array('name' => __tr('Form title', 'quform')),
            'formDescription' => array('name' => __tr('Form description', 'quform')),
            'formElements' => array('name' => _x('Form elements wrapper', 'the HTML wrapper around the form elements', 'quform')),
            'formError' => array('name' => __tr('Form error message', 'quform')),
            'formErrorInner' => array('name' => __tr('Form error message inner wrapper', 'quform')),
            'formErrorTitle' => array('name' => __tr('Form error message title', 'quform')),
            'formErrorContent' => array('name' => __tr('Form error message content', 'quform')),
            'element' => array('name' => _x('Element outer wrapper', 'outermost wrapping HTML element around an element', 'quform')),
            'elementLabel' => array('name' => __tr('Element label', 'quform')),
            'elementLabelText' => array('name' => __tr('Element label text', 'quform')),
            'elementRequiredText' => array('name' => __tr('Element required text', 'quform')),
            'elementInner' => array('name' => _x('Element inner wrapper', 'the inner HTML wrapper around the element', 'quform')),
            'elementInput' => array('name' => _x('Element input wrapper', 'the HTML wrapper around just the input', 'quform')),
            'elementText' => array('name' => __tr('Text input fields', 'quform')),
            'elementTextHover' => array('name' => __tr('Text input fields (hover)', 'quform')),
            'elementTextFocus' => array('name' => __tr('Text input fields (focus)', 'quform')),
            'elementTextarea' => array('name' => __tr('Textarea fields', 'quform')),
            'elementTextareaHover' => array('name' => __tr('Textarea fields (hover)', 'quform')),
            'elementTextareaFocus' => array('name' => __tr('Textarea fields (focus)', 'quform')),
            'elementSelect' => array('name' => __tr('Select fields', 'quform')),
            'elementSelectHover' => array('name' => __tr('Select fields (hover)', 'quform')),
            'elementSelectFocus' => array('name' => __tr('Select fields (focus)', 'quform')),
            'elementIcon' => array('name' => __tr('Text input icons', 'quform')),
            'elementIconHover' => array('name' => __tr('Text input icons (hover)', 'quform')),
            'elementSubLabel' => array('name' => __tr('Element sub label', 'quform')),
            'elementDescription' => array('name' => __tr('Element description', 'quform')),
            'options' => array('name' => _x('Options outer wrapper', 'the wrapper around the list of options for checkboxes and radio buttons', 'quform')),
            'option' => array('name' => _x('Option wrappers', 'the wrapper around each option for checkboxes and radio buttons', 'quform')),
            'optionRadioButton' => array('name' => __tr('Option radio button', 'quform')),
            'optionCheckbox' => array('name' => __tr('Option checkbox', 'quform')),
            'optionLabel' => array('name' => __tr('Option labels', 'quform')),
            'optionLabelSelected' => array('name' => __tr('Option labels (when selected)', 'quform')),
            'optionIcon' => array('name' => __tr('Option icons', 'quform')),
            'optionIconSelected' => array('name' => __tr('Option icons (when selected)', 'quform')),
            'optionText' => array('name' => __tr('Option text', 'quform')),
            'optionTextSelected' => array('name' => __tr('Option text (when selected)', 'quform')),
            'elementError' => array('name' => __tr('Element error', 'quform')),
            'elementErrorInner' => array('name' => __tr('Element error inner wrapper', 'quform')),
            'elementErrorText' => array('name' => __tr('Element error text', 'quform')),
            'page' => array('name' => __tr('Page wrapper', 'quform')),
            'pageTitle' => array('name' => __tr('Page title', 'quform')),
            'pageDescription' => array('name' => __tr('Page description', 'quform')),
            'pageElements' => array('name' => __tr('Page elements wrapper', 'quform')),
            'group' => array('name' => __tr('Group wrapper', 'quform')),
            'groupTitle' => array('name' => __tr('Group title', 'quform')),
            'groupDescription' => array('name' => __tr('Group description', 'quform')),
            'groupElements' => array('name' => __tr('Group elements wrapper', 'quform')),
            'submit' => array('name' => __tr('Submit button outer wrapper', 'quform')),
            'submitInner' => array('name' => __tr('Submit button inner wrapper', 'quform')),
            'submitButton' => array('name' => __tr('Submit button', 'quform')),
            'submitButtonHover' => array('name' => __tr('Submit button (hover)', 'quform')),
            'submitButtonActive' => array('name' => __tr('Submit button (active)', 'quform')),
            'submitButtonText' => array('name' => __tr('Submit button text', 'quform')),
            'submitButtonTextHover' => array('name' => __tr('Submit button text (hover)', 'quform')),
            'submitButtonTextActive' => array('name' => __tr('Submit button text (active)', 'quform')),
            'submitButtonIcon' => array('name' => __tr('Submit button icon', 'quform')),
            'submitButtonIconHover' => array('name' => __tr('Submit button icon (hover)', 'quform')),
            'submitButtonIconActive' => array('name' => __tr('Submit button icon (active)', 'quform')),
            'backInner' => array('name' => __tr('Back button inner wrapper', 'quform')),
            'backButton' => array('name' => __tr('Back button', 'quform')),
            'backButtonHover' => array('name' => __tr('Back button (hover)', 'quform')),
            'backButtonActive' => array('name' => __tr('Back button (active)', 'quform')),
            'backButtonText' => array('name' => __tr('Back button text', 'quform')),
            'backButtonTextHover' => array('name' => __tr('Back button text (hover)', 'quform')),
            'backButtonTextActive' => array('name' => __tr('Back button text (active)', 'quform')),
            'backButtonIcon' => array('name' => __tr('Back button icon', 'quform')),
            'backButtonIconHover' => array('name' => __tr('Back button icon (hover)', 'quform')),
            'backButtonIconActive' => array('name' => __tr('Back button icon (active)', 'quform')),
            'uploadButton' => array('name' => __tr('Upload button', 'quform')),
            'uploadButtonHover' => array('name' => __tr('Upload button (hover)', 'quform')),
            'uploadButtonActive' => array('name' => __tr('Upload button (active)', 'quform')),
            'uploadButtonText' => array('name' => __tr('Upload button text', 'quform')),
            'uploadButtonTextHover' => array('name' => __tr('Upload button text (hover)', 'quform')),
            'uploadButtonTextActive' => array('name' => __tr('Upload button text (active)', 'quform')),
            'uploadButtonIcon' => array('name' => __tr('Upload button icon', 'quform')),
            'uploadButtonIconHover' => array('name' => __tr('Upload button icon (hover)', 'quform')),
            'uploadButtonIconActive' => array('name' => __tr('Upload button icon (active)', 'quform')),
            'datepickerHeader' => array('name' => __tr('Datepicker header', 'quform')),
            'datepickerHeaderText' => array('name' => __tr('Datepicker header text', 'quform')),
            'datepickerHeaderTextHover' => array('name' => __tr('Datepicker header text (hover)', 'quform')),
            'datepickerFooter' => array('name' => __tr('Datepicker footer', 'quform')),
            'datepickerFooterText' => array('name' => __tr('Datepicker footer text', 'quform')),
            'datepickerFooterTextHover' => array('name' => __tr('Datepicker footer text (hover)', 'quform')),
            'datepickerSelection' => array('name' => __tr('Datepicker selection', 'quform')),
            'datepickerSelectionActive' => array('name' => __tr('Datepicker selection (chosen)', 'quform')),
            'datepickerSelectionText' => array('name' => __tr('Datepicker selection text', 'quform')),
            'datepickerSelectionTextHover' => array('name' => __tr('Datepicker selection text (hover)', 'quform')),
            'datepickerSelectionActiveText' => array('name' => __tr('Datepicker selection text (active)', 'quform')),
            'datepickerSelectionActiveTextHover' => array('name' => __tr('Datepicker selection text (chosen) (hover)', 'quform'))
        );

        foreach ($styles as $k => $style) {
            $styles[$k]['config'] = array('type' => $k, 'css' => '');
        }

        $styles = apply_filters('quform_admin_global_styles', $styles);

        if (is_string($key)) {
            if (isset($styles[$key])) {
                return $styles[$key];
            } else {
                return null;
            }
        }

        return $styles;
    }

    /**
     * Get the HTML for a style
     *
     * @return string
     */
    protected function getStyleHtml()
    {
        ob_start(); ?>
        <div class="qfb-style qfb-box">
            <div class="qfb-style-inner qfb-cf">
                <div class="qfb-style-actions">
                    <span class="qfb-style-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                    <span class="qfb-style-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                </div>
                <div class="qfb-style-title"></div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a global style
     *
     * @param   array   $style
     * @return  string
     */
    public function getGlobalStyleHtml(array $style = array())
    {
        $styles = $this->getGlobalStyles();
        $name = ! empty($style) && isset($styles[$style['type']]) ? $styles[$style['type']]['name'] : '';

        ob_start(); ?>
        <div class="qfb-global-style qfb-box"<?php echo !empty($style) ? sprintf(' data-style="%s"', Quform::escape(wp_json_encode($style))) : ''; ?>>
            <div class="qfb-global-style-inner qfb-cf">
                <div class="qfb-global-style-actions">
                    <span class="qfb-global-style-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                    <span class="qfb-global-style-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                </div>
                <div class="qfb-global-style-title"><?php echo esc_html($name); ?></div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Gets the list of styles that are visible for each element
     *
     * @return array
     */
    protected function getVisibleStyles()
    {
        $visible = array(
            'text' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementText', 'elementTextHover', 'elementTextFocus', 'elementSubLabel', 'elementDescription'),
            'email' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementText', 'elementTextHover', 'elementTextFocus', 'elementSubLabel', 'elementDescription'),
            'password' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementText', 'elementTextHover', 'elementTextFocus', 'elementSubLabel', 'elementDescription'),
            'captcha' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementText', 'elementTextHover', 'elementTextFocus', 'elementSubLabel', 'elementDescription'),
            'textarea' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementTextarea', 'elementTextareaHover', 'elementTextareaFocus', 'elementSubLabel', 'elementDescription'),
            'select' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementSelect', 'elementSelectHover', 'elementSelectFocus', 'elementSubLabel', 'elementDescription'),
            'file' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'uploadButton', 'uploadButtonHover', 'uploadButtonActive', 'uploadButtonText', 'uploadButtonTextHover', 'uploadButtonTextActive', 'uploadButtonIcon', 'uploadButtonIconHover', 'uploadButtonIconActive', 'elementSubLabel', 'elementDescription'),
            'recaptcha' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementSubLabel', 'elementDescription'),
            'date' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementText', 'elementIcon', 'elementIconHover', 'elementSubLabel', 'elementDescription', 'datepickerSelection', 'datepickerSelectionActive', 'datepickerSelectionText', 'datepickerSelectionTextHover', 'datepickerSelectionActiveText', 'datepickerSelectionActiveTextHover', 'datepickerFooter', 'datepickerFooterText', 'datepickerFooterTextHover', 'datepickerHeader', 'datepickerHeaderText', 'datepickerHeaderTextHover',),
            'time' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementText', 'elementIcon', 'elementIconHover', 'elementSubLabel', 'elementDescription'),
            'radio' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'options', 'option', 'optionRadioButton', 'optionLabel', 'optionLabelSelected', 'optionIcon', 'optionIconSelected', 'optionText', 'optionTextSelected', 'elementSubLabel', 'elementDescription'),
            'checkbox' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'options', 'option', 'optionCheckbox', 'optionLabel', 'optionLabelSelected', 'optionIcon', 'optionIconSelected', 'optionText', 'optionTextSelected', 'elementSubLabel', 'elementDescription'),
            'multiselect' => array('element', 'elementLabel', 'elementLabelText', 'elementRequiredText', 'elementInput', 'elementSubLabel', 'elementDescription'),
            'page' => array('page', 'pageTitle', 'pageDescription', 'pageElements'),
            'group' => array('group', 'groupTitle', 'groupDescription', 'groupElements'),
            'submit' => array('submit', 'submitInner', 'submitButton', 'submitButtonHover', 'submitButtonActive', 'submitButtonText', 'submitButtonTextHover', 'submitButtonTextActive', 'submitButtonIcon', 'submitButtonIconHover', 'submitButtonIconActive', 'backInner', 'backButton', 'backButtonHover', 'backButtonActive', 'backButtonText', 'backButtonTextHover', 'backButtonTextActive', 'backButtonIcon', 'backButtonIconHover', 'backButtonIconActive', 'nextInner', 'nextButton', 'nextButtonHover', 'nextButtonActive', 'nextButtonText', 'nextButtonTextHover', 'nextButtonTextActive', 'nextButtonIcon', 'nextButtonIconHover', 'nextButtonIconActive')
        );

        $visible = apply_filters('quform_visible_styles', $visible);

        return $visible;
    }

    /**
     * Get the list of filters
     *
     * @return array
     */
    public function getFilters()
    {
        $filters = array(
            'alpha' => array(
                'name' => _x('Alpha', 'the alphabet filter', 'quform'),
                'tooltip' => __tr('Removes any non-alphabet characters', 'quform'),
                'config' => Quform_Filter_Alpha::getDefaultConfig()
            ),
            'alphaNumeric' => array(
                'name' => _x('Alphanumeric', 'the alphanumeric filter', 'quform'),
                'tooltip' => __tr('Removes any non-alphabet characters and non-digits', 'quform'),
                'config' => Quform_Filter_AlphaNumeric::getDefaultConfig()
            ),
            'digits' => array(
                'name' => _x('Digits', 'the digits filter', 'quform'),
                'tooltip' => __tr('Removes any non-digits', 'quform'),
                'config' => Quform_Filter_Digits::getDefaultConfig()
            ),
            'regex' => array(
                'name' => _x('Regex', 'the regex filter', 'quform'),
                'tooltip' => __tr('Removes characters matching the given regular expression', 'quform'),
                'config' => Quform_Filter_Regex::getDefaultConfig()
            ),
            'stripTags' => array(
                'name' => _x('Strip Tags', 'the strip tags filter', 'quform'),
                'tooltip' => __tr('Removes any HTML tags', 'quform'),
                'config' => Quform_Filter_StripTags::getDefaultConfig()
            ),
            'trim' => array(
                'name' => _x('Trim', 'the trim filter', 'quform'),
                'tooltip' => __tr('Removes white space from the start and end', 'quform'),
                'config' => Quform_Filter_Trim::getDefaultConfig()
            )
        );

        $filters = apply_filters('quform_admin_filters', $filters);

        return $filters;
    }

    /**
     * Get the HTML for a filter
     *
     * @return string
     */
    protected function getFilterHtml()
    {
        ob_start();
        ?>
        <div class="qfb-filter qfb-box">
            <div class="qfb-filter-inner qfb-cf">
                <div class="qfb-filter-actions">
                    <span class="qfb-filter-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                    <span class="qfb-filter-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                </div>
                <div class="qfb-filter-title"></div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the list of visible filters for the elements
     *
     * @return array
     */
    protected function getVisibleFilters()
    {
        $visible = array(
            'text' => array('alpha', 'alphaNumeric', 'digits', 'stripTags', 'trim', 'regex'),
            'email' => array('trim'),
            'textarea' => array('alpha', 'alphaNumeric', 'digits', 'stripTags', 'trim', 'regex')
        );

        $visible = apply_filters('quform_visible_filters', $visible);

        return $visible;
    }

    /**
     * Get the validator configurations
     *
     * @return array
     */
    public function getValidators()
    {
        $validators = array(
            'alpha' => array(
                'name' => _x('Alpha', 'the alphabet validator', 'quform'),
                'tooltip' => __tr('Checks that the value contains only alphabet characters', 'quform'),
                'config' => Quform_Validator_Alpha::getDefaultConfig()
            ),
            'alphaNumeric' => array(
                'name' => _x('Alphanumeric', 'the alphanumeric validator', 'quform'),
                'tooltip' => __tr('Checks that the value contains only alphabet or digits', 'quform'),
                'config' => Quform_Validator_AlphaNumeric::getDefaultConfig()
            ),
            'digits' => array(
                'name' => _x('Digits', 'the digits validator', 'quform'),
                'tooltip' => __tr('Checks that the value contains only digits', 'quform'),
                'config' => Quform_Validator_Digits::getDefaultConfig()
            ),
            'email' => array(
                'name' => _x('Email', 'the strip tags validator', 'quform'),
                'tooltip' => __tr('Checks that the value is a valid email address', 'quform'),
                'config' => Quform_Validator_Email::getDefaultConfig()
            ),
            'greaterThan' => array(
                'name' => _x('Greater Than', 'the greater than validator', 'quform'),
                'tooltip' => __tr('Checks that the value is numerically greater than the given minimum', 'quform'),
                'config' => Quform_Validator_GreaterThan::getDefaultConfig()
            ),
            'identical' => array(
                'name' => _x('Identical', 'the identical validator', 'quform'),
                'tooltip' => __tr('Checks that the value is identical to the given token', 'quform'),
                'config' => Quform_Validator_Identical::getDefaultConfig()
            ),
            'inArray' => array(
                'name' => _x('In Array', 'the in array validator', 'quform'),
                'tooltip' => __tr('Checks that the value is in a list of allowed values', 'quform'),
                'config' => Quform_Validator_InArray::getDefaultConfig()
            ),
            'length' => array(
                'name' => _x('Length', 'the length validator', 'quform'),
                'tooltip' => __tr('Checks that the length of the value is between the given maximum and minimum', 'quform'),
                'config' => Quform_Validator_Length::getDefaultConfig()
            ),
            'lessThan' => array(
                'name' => _x('Less Than', 'the less than validator', 'quform'),
                'tooltip' => __tr('Checks that the value is numerically less than the given maximum', 'quform'),
                'config' => Quform_Validator_LessThan::getDefaultConfig()
            ),
            'duplicate' => array(
                'name' => _x('Prevent Duplicates', 'the duplicate validator', 'quform'),
                'tooltip' => __tr('Checks that the same value has not already been submitted', 'quform'),
                'config' => Quform_Validator_Duplicate::getDefaultConfig()
            ),
            'regex' => array(
                'name' => _x('Regex', 'the regex validator', 'quform'),
                'tooltip' => __tr('Checks that the value matches the given regular expression', 'quform'),
                'config' => Quform_Validator_Regex::getDefaultConfig()
            )
        );

        $validators = apply_filters('quform_admin_validators', $validators);

        return $validators;
    }

    /**
     * Get the HTML for a validator
     *
     * @return string
     */
    protected function getValidatorHtml()
    {
        ob_start();
        ?>
        <div class="qfb-validator qfb-box">
            <div class="qfb-validator-inner qfb-cf">
                <div class="qfb-validator-actions">
                    <span class="qfb-validator-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                    <span class="qfb-validator-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                </div>
                <div class="qfb-validator-title"></div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the list of visible validators for the elements
     *
     * @return array
     */
    protected function getVisibleValidators()
    {
        $visible = array(
            'text' => array('alpha', 'alphaNumeric', 'digits', 'duplicate', 'email', 'greaterThan', 'identical', 'inArray', 'length', 'lessThan', 'regex'),
            'textarea' => array('alpha', 'alphaNumeric', 'digits', 'duplicate', 'email', 'greaterThan', 'identical', 'inArray', 'length', 'lessThan', 'regex'),
            'email' => array('duplicate', 'regex'),
            'password' => array('alpha', 'alphaNumeric', 'digits', 'identical', 'inArray', 'length', 'regex'),
            'select' => array('duplicate', 'greaterThan', 'identical', 'inArray', 'lessThan', 'regex'),
            'checkbox' => array('duplicate'),
            'radio' => array('duplicate', 'greaterThan', 'identical', 'inArray', 'lessThan', 'regex'),
            'multiselect' => array('duplicate'),
            'date' => array('duplicate', 'inArray'),
            'time' => array('duplicate', 'inArray'),
            'name' => array('duplicate', 'inArray')
        );

        $visible = apply_filters('quform_visible_validators', $visible);

        return $visible;
    }

    /**
     * Get the HTML for a notification
     *
     * @param   array   $notification
     * @return  string
     */
    public function getNotificationHtml($notification = null)
    {
        if ( ! is_array($notification)) {
            $notification = Quform_Notification::getDefaultConfig();
            $notification['id'] = 0;
        }

        ob_start();
        ?>
        <div class="qfb-notification qfb-box qfb-cf" data-id="<?php echo esc_attr($notification['id']); ?>">
            <div class="qfb-notification-name"><?php echo esc_html($notification['name']); ?></div>
            <div class="qfb-notification-actions">
                <span class="qfb-notification-action-toggle" title="<?php esc_attr_e('Toggle enabled/disabled', 'quform'); ?>"><input type="checkbox" id="qfb-notification-toggle-<?php echo esc_attr($notification['id']); ?>" class="qfb-notification-toggle qfb-mini-toggle" <?php checked($notification['enabled']); ?>><label for="qfb-notification-toggle-<?php echo esc_attr($notification['id']); ?>"></label></span>
                <span class="qfb-notification-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                <span class="qfb-notification-action-duplicate" title="<?php esc_attr_e('Duplicate', 'quform'); ?>"><i class="mdi mdi-content_copy"></i></span>
                <span class="qfb-notification-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
            </div>
            <div class="qfb-notification-subject"><span class="qfb-notification-subject-text"><?php echo esc_html($notification['subject']); ?></span></div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for an email recipient
     *
     * @return  string
     */
    public function getRecipientHtml()
    {
        ob_start();
        ?>
        <div class="qfb-recipient">
            <div class="qfb-recipient-inner qfb-cf">
                <div class="qfb-recipient-left">
                    <select class="qfb-recipient-type">
                        <option value="to"><?php esc_html_e('To', 'quform'); ?></option>
                        <option value="cc"><?php esc_html_e('Cc', 'quform'); ?></option>
                        <option value="bcc"><?php esc_html_e('Bcc', 'quform'); ?></option>
                        <option value="reply"><?php esc_html_e('Reply-To', 'quform'); ?></option>
                    </select>
                </div>
                <div class="qfb-recipient-right">
                    <div class="qfb-recipient-right-inner">
                        <div class="qfb-settings-row qfb-settings-row-2">
                            <div class="qfb-settings-column">
                                <div class="qfb-input-variable">
                                    <input class="qfb-recipient-address" type="text" placeholder="<?php esc_attr_e('Email address (required)', 'quform'); ?>">
                                    <?php echo $this->getInsertVariableHtml(); ?>
                                </div>
                            </div>
                            <div class="qfb-settings-column">
                                <div class="qfb-input-variable">
                                    <input class="qfb-recipient-name" type="text" placeholder="<?php esc_attr_e('Name (optional)', 'quform'); ?>">
                                    <?php echo $this->getInsertVariableHtml(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="qfb-small-remove-button fa fa-trash" title="<?php esc_attr_e('Remove', 'quform'); ?>"></span>
                <span class="qfb-small-add-button mdi mdi-add_circle" title="<?php esc_attr_e('Add', 'quform'); ?>"></span>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for the insert variable button
     *
     * @param   string  $targetId    The unique ID of the target field
     * @param   bool    $preProcess  Whether it is the pre process variables
     * @return  string
     */
    public function getInsertVariableHtml($targetId = '', $preProcess = false)
    {
        return sprintf(
            '<span class="qfb-insert-variable%s" title="%s"%s><i class="fa fa-code"></i></span>',
            $preProcess ? ' qfb-insert-variable-pre-process' : '',
            esc_attr__('Insert variable...', 'quform'),
            $targetId ? ' data-target-id="' . esc_attr($targetId) . '"' : ''
        );
    }

    /**
     * Get the HTML for a confirmation
     *
     * @param   array   $confirmation
     * @return  string
     */
    public function getConfirmationHtml($confirmation = null)
    {
        if ( ! is_array($confirmation)) {
            $confirmation = Quform_Confirmation::getDefaultConfig();
            $confirmation['id'] = 0;
        }

        ob_start();
        ?>
        <div class="qfb-confirmation qfb-box qfb-cf" data-id="<?php echo esc_attr($confirmation['id']); ?>">
            <div class="qfb-confirmation-name"><?php echo esc_html($confirmation['name']); ?></div>
            <div class="qfb-confirmation-actions">
                <?php if ($confirmation['id'] != 1) : ?>
                    <span class="qfb-confirmation-action-toggle" title="<?php esc_attr_e('Toggle enabled/disabled', 'quform'); ?>"><input type="checkbox" id="qfb-confirmation-toggle-<?php echo esc_attr($confirmation['id']); ?>" class="qfb-confirmation-toggle qfb-mini-toggle" <?php checked($confirmation['enabled']); ?>><label for="qfb-confirmation-toggle-<?php echo esc_attr($confirmation['id']); ?>"></label></span>
                    <span class="qfb-confirmation-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                <?php endif; ?>
                <span class="qfb-confirmation-action-duplicate" title="<?php esc_attr_e('Duplicate', 'quform'); ?>"><i class="mdi mdi-content_copy"></i></span>
                <span class="qfb-confirmation-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
            </div>
            <div class="qfb-confirmation-description"><?php echo $this->getConfirmationDescription($confirmation); ?></div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the confirmation description
     *
     * Changes should be mirrored in builder.confirmations.js:getConfirmationDescription
     *
     * @param   array   $confirmation
     * @return  string
     */
    protected function getConfirmationDescription(array $confirmation)
    {
        $type = $confirmation['type'];

        $output = sprintf(
            '<div class="qfb-settings-row%s">',
            $type == 'message-redirect-page' || $type == 'message-redirect-url' ? ' qfb-settings-row-2' : ''
        );

        $output .= '<div class="qfb-settings-column">';

        switch ($type) {
            case 'message':
            case 'message-redirect-page':
            case 'message-redirect-url':
                $output .= sprintf('<i class="mdi mdi-message" title="%s"></i>', esc_attr__('Display a message', 'quform'));
                $output .= sprintf(
                    '<span class="qfb-confirmation-description-message">%s</span>',
                    Quform::escape(mb_substr(strip_tags($confirmation['message']), 0, 64))
                );
                break;
            case 'redirect-page';
                $output .= sprintf('<i class="mdi mdi-arrow_forward" title="%s"></i>', esc_attr__('Redirect to', 'quform'));
                $output .= sprintf(
                    '<span class="qfb-confirmation-description-redirect-page">%s</span>',
                    Quform::escape(Quform::getPostTitle(get_post($confirmation['redirectPage'])))
                );
                break;
            case 'redirect-url';
                $output .= sprintf('<i class="mdi mdi-arrow_forward" title="%s"></i>', esc_attr__('Redirect to', 'quform'));
                $output .= sprintf(
                    '<span class="qfb-confirmation-description-redirect-url">%s</span>',
                    Quform::escape($confirmation['redirectUrl'])
                );
                break;
            case 'reload';
                $output .= sprintf('<i class="mdi mdi-refresh" title="%s"></i>', esc_attr__('Reload the page', 'quform'));
                break;
        }

        $output .= '</div>';

        if ($type == 'message-redirect-page' || $type == 'message-redirect-url') {
            $output .= '<div class="qfb-settings-column">';

            switch ($type) {
                case 'message-redirect-page';
                    $output .= sprintf('<i class="mdi mdi-arrow_forward" title="%s"></i>', esc_attr__('Redirect to', 'quform'));
                    $output .= sprintf(
                        '<span class="qfb-confirmation-description-redirect-page">%s</span>',
                        Quform::escape(Quform::getPostTitle(get_post($confirmation['redirectPage'])))
                    );
                    break;
                case 'message-redirect-url';
                    $output .= sprintf('<i class="mdi mdi-arrow_forward" title="%s"></i>', esc_attr__('Redirect to', 'quform'));
                    $output .= sprintf(
                        '<span class="qfb-confirmation-description-redirect-url">%s</span>',
                        Quform::escape($confirmation['redirectUrl'])
                    );
                    break;
            }

            $output .= '</div>';
        }

        $output .= '</div>';

        return $output;
    }

    /**
     * Get the HTML for a select menu of available title tag options
     *
     * @param   string  $id        The ID of the field
     * @param   string  $selected  The selected value
     * @return  string
     */
    public function getTitleTagSelectHtml($id, $selected = '')
    {
        $tags = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span');
        $output = sprintf('<select id="%s">', $id);

        foreach ($tags as $tag) {
            $output .= sprintf('<option value="%1$s"%2$s>%1$s</option>', Quform::escape($tag), $selected == $tag ? ' selected="selected"' : '');
        }

        $output .= '</select>';

        return $output;
    }

    /**
     * Get the HTML for the custom database column settings
     *
     * @param   array|null  $column  The existing column config
     * @return  string
     */
    public function getDbColumnHtml($column = null)
    {
        if ( ! is_array($column)) {
            $column = array(
                'name' => '',
                'value' => ''
            );
        }

        $variableId = uniqid('q');
        ob_start();
        ?>
        <div class="qfb-form-db-column qfb-cf">
            <input type="text" class="qfb-form-db-column-name" placeholder="<?php esc_attr_e('Column', 'quform'); ?>" value="<?php echo esc_attr($column['name']); ?>">
            <input id="<?php echo esc_attr($variableId); ?>" type="text" class="qfb-form-db-column-value" placeholder="<?php esc_attr_e('Value', 'quform'); ?>" value="<?php echo esc_attr($column['value']); ?>">
            <?php echo $this->getInsertVariableHtml($variableId); ?>
            <span class="qfb-small-remove-button fa fa-trash" title="<?php esc_attr_e('Remove', 'quform'); ?>"></span>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the default form configuration array with populated default settings
     *
     * @return array
     */
    public function getDefaultForm()
    {
        $page = $this->getDefaultElementConfig('page');
        $page['id'] = 1;
        $page['parentId'] = 0;
        $page['position'] = 0;

        $submit = $this->getDefaultElementConfig('submit');
        $submit['id'] = 2;
        $submit['parentId'] = 1;
        $submit['position'] = 0;

        $page['elements'] = array($submit);

        $notification = Quform_Notification::getDefaultConfig();
        $notification['id'] = 1;
        $notification['name'] = __tr('Admin notification', 'quform');
        $notification['html'] = '{all_form_data}';

        $confirmation = Quform_Confirmation::getDefaultConfig();
        $confirmation['id'] = 1;
        $confirmation['name'] = __tr('Default confirmation', 'quform');
        $confirmation['message'] = __tr('Your message has been sent, thanks.', 'quform');
        $confirmation['messageIcon'] = 'qicon-check';

        $form = Quform_Form::getDefaultConfig();
        $form['nextElementId'] = 3;
        $form['elements'] = array($page);
        $form['nextNotificationId'] = 2;
        $form['notifications'] = array($notification);
        $form['nextConfirmationId'] = 2;
        $form['confirmations'] = array($confirmation);

        $form = apply_filters('quform_default_form', $form);

        return $form;
    }

    /**
     * @param   array   $form
     * @param   string  $key
     * @return  mixed
     */
    public function getFormConfigValue($form, $key)
    {
        $value = Quform::get($form, $key);

        if ($value === null) {
            $value = Quform::get(Quform_Form::getDefaultConfig(), $key);
        }

        return $value;
    }

    /**
     * Get the HTML for all pages and elements for the form builder
     *
     * @param   array   $elements  The array of element configs
     * @return  string
     */
    public function renderFormElements($elements)
    {
        $output = '';

        foreach ($elements as $element) {
            $output .= $this->getElementHtml($element);
        }

        return $output;
    }

    /**
     * Get the HTML for an element in the form builder
     *
     * @param   array   $element  The element config
     * @return  string
     */
    protected function getElementHtml(array $element)
    {
        switch ($element['type']) {
            case 'page':
                $output = $this->getPageHtml($element);
                break;
            case 'group':
                $output = $this->getGroupHtml($element);
                break;
            case 'row':
                $output = $this->getRowHtml($element);
                break;
            case 'column':
                $output = $this->getColumnHtml($element);
                break;
            default:
                $output = $this->getFieldHtml($element);
                break;
        }

        return $output;
    }

    /**
     * Get the HTML for a page for the form builder
     *
     * @param   array   $element  The page config
     * @return  string
     */
    protected function getPageHtml(array $element)
    {
        ob_start(); ?>
        <div id="qfb-element-<?php echo esc_attr($element['id']); ?>" class="qfb-element qfb-element-page" data-id="<?php echo esc_attr($element['id']); ?>" data-type="page">
            <div id="qfb-child-elements-<?php echo esc_attr($element['id']); ?>" class="qfb-child-elements qfb-cf">
                <?php
                foreach ($element['elements'] as $child) {
                    echo $this->getElementHtml($child);
                }
                ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a group for the form builder
     *
     * @param   array  $element  The group config
     * @return  string           The HTML
     */
    protected function getGroupHtml(array $element)
    {
        ob_start(); ?>
        <div id="qfb-element-<?php echo esc_attr($element['id']); ?>" class="qfb-element qfb-element-group" data-id="<?php echo esc_attr($element['id']); ?>" data-type="group">
            <div class="qfb-element-inner qfb-cf">
                <span class="qfb-element-type-icon"><i class="fa fa-object-group"></i></span>
                <label class="qfb-preview-label<?php echo ( ! Quform::isNonEmptyString($element['label']) ? ' qfb-hidden' : ''); ?>"><span id="qfb-plc-<?php echo esc_attr($element['id']); ?>" class="qfb-preview-label-content"><?php echo esc_html($element['label']); ?></span></label>
                <div class="qfb-element-actions">
                    <span class="qfb-element-action-collapse" title="<?php esc_attr_e('Collapse', 'quform'); ?>"><i class="mdi mdi-remove_circle_outline"></i></span>
                    <span class="qfb-element-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                    <span class="qfb-element-action-duplicate" title="<?php esc_attr_e('Duplicate', 'quform'); ?>"><i class="mdi mdi-content_copy"></i></span>
                    <span class="qfb-element-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                </div>
            </div>
            <div id="qfb-child-elements-<?php echo esc_attr($element['id']); ?>" class="qfb-child-elements qfb-cf">
                <?php
                foreach ($element['elements'] as $child) {
                    echo $this->getElementHtml($child);
                }
                ?>
            </div>
            <div class="qfb-element-group-empty-indicator"><span class="qfb-element-group-empty-indicator-arrow"><i class="fa fa-arrow-down"></i></span><span class="qfb-element-group-empty-add-row" title="<?php esc_attr_e('Add column layout', 'quform'); ?>"><i class="fa fa-columns"></i><i class="mdi mdi-add_circle"></i></span></div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a row for the form builder
     *
     * @param   array   $element  The row config
     * @return  string
     */
    protected function getRowHtml(array $element)
    {
        ob_start(); ?>
        <div id="qfb-element-<?php echo esc_attr($element['id']); ?>" class="qfb-element qfb-element-row" data-id="<?php echo esc_attr($element['id']); ?>" data-type="row">
            <div id="qfb-child-elements-<?php echo esc_attr($element['id']); ?>" class="qfb-child-elements qfb-cf qfb-<?php echo esc_attr(count($element['elements'])); ?>-columns">
                <?php
                foreach ($element['elements'] as $child) {
                    echo $this->getElementHtml($child);
                }
                ?>
            </div>
            <div class="qfb-row-actions">
                <span class="qfb-row-action-add-column" title="<?php esc_attr_e('Add column', 'quform'); ?>"><i class="mdi mdi-add_circle"></i></span>
                <span class="qfb-row-action-remove-column" title="<?php esc_attr_e('Remove column', 'quform'); ?>"><i class="mdi mdi-remove_circle"></i></span>
                <span class="qfb-row-action-remove" title="<?php esc_attr_e('Remove row', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                <span class="qfb-row-action-duplicate" title="<?php esc_attr_e('Duplicate row', 'quform'); ?>"><i class="mdi mdi-content_copy"></i></span>
                <span class="qfb-row-action-settings" title="<?php esc_attr_e('Row settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                <span class="qfb-row-action-move" title="<?php esc_attr_e('Move row', 'quform'); ?>"><i class="fa fa-arrows"></i></span>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a column for the form builder
     *
     * @param   array   $element  The column config
     * @return  string
     */
    protected function getColumnHtml(array $element)
    {
        ob_start(); ?>
        <div id="qfb-element-<?php echo esc_attr($element['id']); ?>" class="qfb-element qfb-element-column" data-id="<?php echo esc_attr($element['id']); ?>" data-type="column">
            <div id="qfb-child-elements-<?php echo esc_attr($element['id']); ?>" class="qfb-child-elements qfb-cf">
                <?php
                foreach ($element['elements'] as $child) {
                    echo $this->getElementHtml($child);
                }
                ?>
            </div>
            <div class="qfb-column-actions">
                <span class="qfb-column-action-remove" title="<?php esc_attr_e('Remove column', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                <span class="qfb-column-action-duplicate" title="<?php esc_attr_e('Duplicate column', 'quform'); ?>"><i class="mdi mdi-content_copy"></i></span>
                <span class="qfb-column-action-move" title="<?php esc_attr_e('Move column', 'quform'); ?>"><i class="fa fa-arrows"></i></span>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a field for the form builder
     *
     * @param   array  $element  The element config
     * @return  string           The HTML
     */
    protected function getFieldHtml(array $element)
    {
        $data = $this->getElements($element['type']);

        ob_start(); ?>
        <div id="qfb-element-<?php echo esc_attr($element['id']); ?>" class="qfb-element qfb-element-<?php echo esc_attr($element['type']) . (isset($element['required']) && $element['required'] ? ' qfb-element-required' : ''); ?>" data-id="<?php echo esc_attr($element['id']); ?>" data-type="<?php echo esc_attr($element['type']); ?>">
            <div class="qfb-element-inner qfb-cf">
                <span class="qfb-element-type-icon"><?php echo $data['icon']; ?></span>
                <label class="qfb-preview-label<?php echo ( ! Quform::isNonEmptyString($element['label']) ? ' qfb-hidden' : ''); ?>"><span id="qfb-plc-<?php echo esc_attr($element['id']); ?>" class="qfb-preview-label-content"><?php echo esc_html($element['label']); ?></span></label>
                <div class="qfb-element-actions">
                    <span class="qfb-element-action-required" title="<?php esc_attr_e('Toggle required', 'quform'); ?>"><i class="mdi mdi-done"></i></span>
                    <span class="qfb-element-action-remove" title="<?php esc_attr_e('Remove', 'quform'); ?>"><i class="fa fa-trash"></i></span>
                    <span class="qfb-element-action-duplicate" title="<?php esc_attr_e('Duplicate', 'quform'); ?>"><i class="mdi mdi-content_copy"></i></span>
                    <span class="qfb-element-action-settings" title="<?php esc_attr_e('Settings', 'quform'); ?>"><i class="mdi mdi-settings"></i></span>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a default element with the given type
     *
     * @param   string  $type  The element type
     * @return  string
     */
    protected function getDefaultElementHtml($type)
    {
        $element = $this->getDefaultElementConfig($type);
        $element['id'] = 0;

        return $this->getElementHtml($element);
    }

    /**
     * Get the HTML for a single page tab nav
     *
     * @param   int     $key
     * @param   array   $elementId
     * @param   string  $label
     * @return  string
     */
    public function getPageTabNavHtml($key = null, $elementId = null, $label = null)
    {
        $output = '<li class="qfb-page-tab-nav k-item' . ($key === 0 ? ' qfb-current-page k-state-active' : '') . '"' . (is_numeric($elementId) ? sprintf(' data-id="%d"', esc_attr($elementId)) : '') . '>';
        $output .= '<span class="qfb-page-tab-nav-label">';

        if (Quform::isNonEmptyString($label)) {
            $output .= esc_html($label);
        } else if (is_numeric($key)) {
            $output .= esc_html(sprintf(__tr('Page %s', 'quform'), $key + 1));
        }

        $output .= '</span>';
        $output .= '<span class="qfb-page-actions">';
        $output .= '<span class="qfb-page-action-settings" title="' . esc_attr__('Settings', 'quform') . '"><i class="mdi mdi-settings"></i></span>';
        $output .= '<span class="qfb-page-action-duplicate" title="' . esc_attr__('Duplicate', 'quform') . '"><i class="mdi mdi-content_copy"></i></span>';
        $output .= '<span class="qfb-page-action-remove" title="' . esc_attr__('Remove', 'quform') . '"><i class="fa fa-trash"></i></span>';
        $output .= '</span></li>';

        return $output;
    }

    /**
     * @return array
     */
    public function getVariables()
    {
        $variables = $this->getPreProcessVariables();

        $variables['general']['variables']['{entry_id}'] = __tr('Entry ID', 'quform');
        $variables['general']['variables']['{form_name}'] = __tr('Form Name', 'quform');
        $variables['general']['variables']['{all_form_data}'] = __tr('All Form Data', 'quform');
        $variables['general']['variables']['{default_email_address}'] = __tr('Default Email Address', 'quform');
        $variables['general']['variables']['{default_email_name}'] = __tr('Default Email Name', 'quform');
        $variables['general']['variables']['{default_from_email_address}'] = __tr('Default "From" Email Address', 'quform');
        $variables['general']['variables']['{default_from_email_name}'] = __tr('Default "From" Email Name', 'quform');
        $variables['general']['variables']['{admin_email}'] = __tr('Admin Email', 'quform');

        return apply_filters('quform_variables', $variables);
    }

    /**
     * @return array
     */
    public function getPreProcessVariables()
    {
        return apply_filters('quform_pre_process_variables', array(
            'general' => array(
                'heading' => __tr('General', 'quform'),
                'variables' => array(
                    '{url}' => __tr('Form URL', 'quform'),
                    '{referring_url}' => __tr('Referring URL', 'quform'),
                    '{post|ID}' => __tr('Post ID', 'quform'),
                    '{post|post_title}' => __tr('Post Title', 'quform'),
                    '{date}' => __tr('Date', 'quform'),
                    '{time}' => __tr('Time', 'quform'),
                    '{site_title}' => __tr('Site Title', 'quform'),
                    '{site_tagline}' => __tr('Site Description', 'quform')
                )
            ),
            'user' => array(
                'heading' => __tr('User', 'quform'),
                'variables' => array(
                    '{ip}' => __tr('IP Address', 'quform'),
                    '{user_agent}' => __tr('User Agent', 'quform'),
                    '{user|display_name}' => __tr('Display Name', 'quform'),
                    '{user|user_email}' => __tr('Email', 'quform'),
                    '{user|user_login}' => __tr('Login', 'quform')
                )
            )
        ));
    }

    /**
     * The supported reCAPTCHA languages from https://developers.google.com/recaptcha/docs/language
     *
     * @return array
     */
    public function getRecaptchaLanguages()
    {
        return array(
            '' => __tr('Autodetect', 'quform'),
            'ar' => 'Arabic',
            'bn' => 'Bengali',
            'bg' => 'Bulgarian',
            'ca' => 'Catalan',
            'zh-CN' => 'Chinese (Simplified)',
            'zh-TW' => 'Chinese (Traditional)',
            'hr' => 'Croatian',
            'cs' => 'Czech',
            'da' => 'Danish',
            'nl' => 'Dutch',
            'en-GB' => 'English (UK)',
            'en' => 'English',
            'et' => 'Estonian',
            'fil' => 'Filipino',
            'fi' => 'Finnish',
            'fr' => 'French',
            'fr-CA' => 'French (Canadian)',
            'de' => 'German',
            'gu' => 'Gujarati',
            'de-AT' => 'German (Austria)',
            'de-CH' => 'German (Switzerland)',
            'el' => 'Greek',
            'iw' => 'Hebrew',
            'hi' => 'Hindi',
            'hu' => 'Hungarian',
            'id' => 'Indonesian',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'kn' => 'Kannada',
            'ko' => 'Korean',
            'lv' => 'Latvian',
            'lt' => 'Lithuanian',
            'ms' => 'Malay',
            'ml' => 'Malayalam',
            'mr' => 'Marathi',
            'no' => 'Norwegian',
            'fa' => 'Persian',
            'pl' => 'Polish',
            'pt' => 'Portuguese',
            'pt-BR' => 'Portuguese (Brazil)',
            'pt-PT' => 'Portuguese (Portugal)',
            'ro' => 'Romanian',
            'ru' => 'Russian',
            'sr' => 'Serbian',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'es' => 'Spanish',
            'es-419' => 'Spanish (Latin America)',
            'sv' => 'Swedish',
            'ta' => 'Tamil',
            'te' => 'Telugu',
            'th' => 'Thai',
            'tr' => 'Turkish',
            'uk' => 'Ukrainian',
            'ur' => 'Urdu',
            'vi' => 'Vietnamese'
        );
    }

    /**
     * Get the HTML for a blank logic rule
     *
     * @return string
     */
    protected function getLogicRuleHtml()
    {
        $output = '<div class="qfb-logic-rule qfb-box">';
        $output .= '<div class="qfb-logic-rule-columns qfb-cf">';
        $output .= '<div class="qfb-logic-rule-column qfb-logic-rule-column-element"></div>';
        $output .= '<div class="qfb-logic-rule-column qfb-logic-rule-column-operator"></div>';
        $output .= '<div class="qfb-logic-rule-column qfb-logic-rule-column-value"></div>';
        $output .= '</div>';
        $output .= sprintf('<span class="qfb-small-add-button mdi mdi-add_circle" title="%s"></span>', esc_attr__('Add new logic rule', 'quform'));
        $output .= sprintf('<span class="qfb-small-remove-button fa fa-trash" title="%s"></span>', esc_attr__('Remove logic rule', 'quform'));
        $output .= '</div>';

        return $output;
    }

    /**
     * Get the element types that can be used as a source for conditional logic
     *
     * @return array
     */
    protected function getLogicSourceTypes()
    {
        return apply_filters('quform_logic_source_types', array(
            'text', 'textarea', 'email', 'select', 'radio', 'checkbox', 'multiselect', 'file', 'date', 'time', 'hidden', 'password'
        ));
    }

    /**
     * Get the element types than can be used as a source for attachments
     *
     * @return array
     */
    protected function getAttachmentSourceTypes()
    {
        return apply_filters('quform_attachment_source_types', array(
            'file'
        ));
    }

    /**
     * Handle the request to save the form via Ajax
     */
    public function save()
    {
        $this->validateSaveRequest();

        $config = json_decode(stripslashes($_POST['form']), true);

        if ( ! is_array($config)) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Malformed form configuration', 'quform')
            ));
        }

        $config = $this->sanitiseForm($config);

        $this->validateForm($config);

        $config = $this->repository->save($config);

        $this->scriptLoader->handleSaveForm($config);

        wp_send_json(array(
            'type' => 'success'
        ));
    }

    /**
     * Validate the request to save the form
     */
    protected function validateSaveRequest()
    {
        if ( ! Quform::isPostRequest() || ! isset($_POST['form'])) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Bad request', 'quform')
            ));
        }

        if ( ! current_user_can('quform_edit_forms')) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Insufficient permissions', 'quform')
            ));
        }

        if ( ! check_ajax_referer('quform_save_form', false, false)) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Nonce check failed', 'quform')
            ));
        }
    }

    /**
     * Sanitise the given form config and return it
     *
     * @param   array  $config
     * @return  array
     */
    public function sanitiseForm(array $config)
    {
        $config['name'] = sanitize_text_field($config['name']);

        foreach($config['elements'] as $key => $page) {
            $config['elements'][$key] = $this->sanitisePage($page);
        }

        return $config;
    }

    /**
     * Sanitise the given page config and return it
     *
     * @param   array  $page
     * @return  array
     */
    protected function sanitisePage(array $page)
    {
        $page = $this->sanitiseContainer($page);

        return $page;
    }

    /**
     * Sanitise the given container config and return it
     *
     * @param   array  $container
     * @return  array
     */
    protected function sanitiseContainer(array $container)
    {
        foreach($container['elements'] as $key => $element) {
            $container['elements'][$key] = $this->sanitiseElement($element);

            if ($element['type'] == 'group' || $element['type'] == 'row' || $element['type'] == 'column') {
                $container['elements'][$key] = $this->sanitiseContainer($element);
            }
        }

        return $container;
    }

    /**
     * Sanitise the given element config and return it
     *
     * @param   array  $element
     * @return  array
     */
    protected function sanitiseElement(array $element)
    {
        switch ($element['type']) {
            case 'time':
                $element['timeInterval'] = isset($element['timeInterval']) && is_numeric($element['timeInterval']) ? (string) Quform::clamp((int) $element['timeInterval'], 1, 60) : Quform_Element_Time::getDefaultConfig('timeInterval');
                break;
            case 'captcha':
                $element['captchaLength'] = isset($element['captchaLength']) && is_numeric($element['captchaLength']) ? (string) Quform::clamp((int) $element['captchaLength'], 2, 32) : Quform_Element_Captcha::getDefaultConfig('captchaLength');
                $element['captchaWidth'] = isset($element['captchaWidth']) && is_numeric($element['captchaWidth']) ? (string) Quform::clamp((int) $element['captchaWidth'], 20, 300) : Quform_Element_Captcha::getDefaultConfig('captchaWidth');
                $element['captchaHeight'] = isset($element['captchaHeight']) && is_numeric($element['captchaHeight']) ? (string) Quform::clamp((int) $element['captchaHeight'], 10, 300) : Quform_Element_Captcha::getDefaultConfig('captchaHeight');
                $element['captchaBgColor'] = isset($element['captchaBgColor']) && Quform::isNonEmptyString($element['captchaBgColor']) ? sanitize_text_field($element['captchaBgColor']) : Quform_Element_Captcha::getDefaultConfig('captchaBgColor');
                $element['captchaBgColorRgba'] = is_array($element['captchaBgColorRgba']) ? $this->sanitiseRgbColorArray($element['captchaBgColorRgba']) : Quform_Element_Captcha::getDefaultConfig('captchaBgColorRgba');
                $element['captchaTextColor'] = isset($element['captchaTextColor']) && Quform::isNonEmptyString($element['captchaTextColor']) ? sanitize_text_field($element['captchaTextColor']) : Quform_Element_Captcha::getDefaultConfig('captchaTextColor');
                $element['captchaTextColorRgba'] = is_array($element['captchaTextColorRgba']) ? $this->sanitiseRgbColorArray($element['captchaTextColorRgba']) : Quform_Element_Captcha::getDefaultConfig('captchaTextColorRgba');
                $element['captchaFont'] = isset($element['captchaFont']) && Quform::isNonEmptyString($element['captchaFont']) ? sanitize_text_field($element['captchaFont']) : Quform_Element_Captcha::getDefaultConfig('captchaFont');
                $element['captchaMinFontSize'] = isset($element['captchaMinFontSize']) && is_numeric($element['captchaMinFontSize']) ? (string) Quform::clamp((int) $element['captchaMinFontSize'], 5, 72) : Quform_Element_Captcha::getDefaultConfig('captchaMinFontSize');
                $element['captchaMaxFontSize'] = isset($element['captchaMaxFontSize']) && is_numeric($element['captchaMaxFontSize']) ? (string) Quform::clamp((int) $element['captchaMaxFontSize'], 5, 72) : Quform_Element_Captcha::getDefaultConfig('captchaMaxFontSize');
                $element['captchaMinAngle'] = isset($element['captchaMinAngle']) && is_numeric($element['captchaMinAngle']) ? (string) Quform::clamp((int) $element['captchaMinAngle'], 0, 360) : Quform_Element_Captcha::getDefaultConfig('captchaMinAngle');
                $element['captchaMaxAngle'] = isset($element['captchaMaxAngle']) && is_numeric($element['captchaMaxAngle']) ? (string) Quform::clamp((int) $element['captchaMaxAngle'], 0, 360) : Quform_Element_Captcha::getDefaultConfig('captchaMaxAngle');
                $element['captchaRetina'] = isset($element['captchaRetina']) ? (bool) $element['captchaRetina'] : Quform_Element_Captcha::getDefaultConfig('captchaRetina');

                // If any minimums are greater than maximums, swap them around
                if ($element['captchaMinFontSize'] > $element['captchaMaxFontSize']) {
                    $tmp = $element['captchaMaxFontSize'];
                    $element['captchaMaxFontSize'] = $element['captchaMinFontSize'];
                    $element['captchaMinFontSize'] = $tmp;
                }

                if ($element['captchaMinAngle'] > $element['captchaMaxAngle']) {
                    $tmp = $element['captchaMaxAngle'];
                    $element['captchaMaxAngle'] = $element['captchaMinAngle'];
                    $element['captchaMinAngle'] = $tmp;
                }
                break;
        }

        return $element;
    }

    /**
     * Make sure the colour values are acceptable
     *
     * @param   array  $color
     * @return  array
     */
    protected function sanitiseRgbColorArray(array $color)
    {
        $color = array(
            'r' => Quform::clamp((int) $color['r'], 0, 255),
            'g' => Quform::clamp((int) $color['g'], 0, 255),
            'b' => Quform::clamp((int) $color['b'], 0, 255)
        );

        return $color;
    }

    /**
     * Handle the Ajax request to add a new form
     */
    public function add()
    {
        $this->validateAddRequest();

        $name = wp_unslash($_POST['name']);

        $nameLength = Quform::strlen($name);

        if ($nameLength == 0) {
            wp_send_json(array(
                'type' => 'error',
                'errors' => array(
                    'qfb-forms-add-name' => __tr('This field is required', 'quform')
                )
            ));
        } elseif ($nameLength > 64) {
            wp_send_json(array(
                'type' => 'error',
                'errors' => array(
                    'qfb-forms-add-name' => __tr('The form name must be no longer than 64 characters', 'quform')
                )
            ));
        }

        $config = $this->getDefaultForm();
        $config['name'] = $name;

        $config = $this->repository->add($config);

        if ( ! is_array($config)) {
            wp_send_json(array(
                'type' => 'error',
                'message' => wp_kses(sprintf(
                    __tr('Failed to insert into database, check the %serror log%s for more information', 'quform'),
                    '<a href="http://support.themecatcher.net/quform-wordpress-v2/guides/advanced/enabling-debug-logging">',
                    '</a>'
                ), array('a' => array('href' => array())))
            ));
        }

        wp_send_json(array(
            'type' => 'success',
            'url' => admin_url('admin.php?page=quform.forms&sp=edit&id=' . $config['id'])
        ));
    }

    /**
     * Validate the request to add a new form
     */
    protected function validateAddRequest()
    {
        if ( ! Quform::isPostRequest() || ! isset($_POST['name']) || ! is_string($_POST['name'])) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Bad request', 'quform')
            ));
        }

        if ( ! current_user_can('quform_add_forms')) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Insufficient permissions', 'quform')
            ));
        }

        if ( ! check_ajax_referer('quform_add_form', false, false)) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Nonce check failed', 'quform')
            ));
        }
    }

    /**
     * Handle the request to preview the form via Ajax
     */
    public function preview()
    {
        $this->validatePreviewRequest();

        $config = json_decode(stripslashes(Quform::get($_POST, 'form')), true);

        if ( ! is_array($config)) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Bad request', 'quform')
            ));
        }

        // Ajax must be enable to submit the form in the preview
        $config = $this->sanitiseForm($config);
        $config['ajax'] = true;
        $config['environment'] = 'preview';

        $form = $this->factory->create($config);
        $form->setCurrentPageById(Quform::get($_POST, 'page'));

        wp_send_json(array(
            'type' => 'success',
            'form' => $form->render(),
            'css' => $form->getCss()
        ));
    }

    /**
     * Validate the request to preview the form
     */
    protected function validatePreviewRequest()
    {
        if ( ! Quform::isPostRequest() || ! isset($_POST['form'])) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Bad request', 'quform')
            ));
        }

        if ( ! current_user_can('quform_edit_forms')) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('Insufficient permissions', 'quform')
            ));
        }
    }

    /**
     * @param array $config
     */
    protected function validateForm(array $config)
    {
        if ( ! Quform::isNonEmptyString($config['name'])) {
            wp_send_json(array(
                'type'    => 'error',
                'message' => __tr('A form name is required.', 'quform')
            ));
        }
    }

    /**
     * @return array
     */
    public function getThemes()
    {
        return $this->themes->getThemes();
    }

    /**
     * return array
     */
    public function getLocales()
    {
        return array('' => array('name' => 'Default')) + Quform::getLocales();
    }

    /**
     * @return array
     */
    protected function getLoadedPreviewLocales()
    {
        $activeLocales = array();

        foreach ($this->options->get('activeLocales') as $locales) {
            $activeLocales = array_merge($activeLocales, $locales);
        }

        return $activeLocales;
    }

    /**
     * @return string
     */
    protected function getAttachmentHtml()
    {
        ob_start();
        ?>
        <div class="qfb-attachment qfb-box qfb-cf">
            <div class="qfb-attachment-inner">
                <span class="qfb-attachment-remove qfb-small-remove-button fa fa-trash" title="<?php esc_attr_e('Remove', 'quform'); ?>"></span>
                <div class="qfb-sub-setting">
                    <div class="qfb-sub-setting-label">
                        <label><?php esc_html_e('Source', 'quform'); ?></label>
                    </div>
                    <div class="qfb-sub-setting-inner">
                        <div class="qfb-sub-setting-input">
                            <select class="qfb-attachment-source">
                                <option value="media"><?php esc_html_e('Media library', 'quform'); ?></option>
                                <option value="element"><?php esc_html_e('Form element', 'quform'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="qfb-sub-setting">
                    <div class="qfb-sub-setting-label">
                        <label><?php esc_html_e('Element', 'quform'); ?></label>
                    </div>
                    <div class="qfb-sub-setting-inner">
                        <div class="qfb-sub-setting-input">
                            <select class="qfb-attachment-element"></select>
                        </div>
                    </div>
                </div>
                <div class="qfb-sub-setting">
                    <div class="qfb-sub-setting-label">
                        <label><?php esc_html_e('File(s)', 'quform'); ?></label>
                    </div>
                    <div class="qfb-sub-setting-inner">
                        <div class="qfb-sub-setting-input">
                            <div class="qfb-cf">
                                <span class="qfb-button-blue qfb-attachment-browse"><i class="mdi mdi-panorama"></i><?php esc_html_e('Browse', 'quform'); ?></span>
                            </div>
                            <div class="qfb-attachment-media"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for the database password field
     *
     * @return string
     */
    public function getDbPasswordHtml()
    {
        ob_start();
        ?>
        <input type="text" id="qfb_form_db_password" value="">
        <p class="qfb-description"><?php esc_html_e('The password for the user above.', 'quform'); ?></p>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the HTML for a select menu
     *
     * @param   string  $id             The ID of the field
     * @param   array   $options        The select options
     * @param   string  $selectedValue  The selected value
     * @return  string
     */
    protected function getSelectHtml($id, array $options, $selectedValue = '')
    {
        $output = sprintf('<select id="%s">', Quform::escape($id));

        foreach ($options as $value => $label) {
            $output .= sprintf(
                '<option value="%s"%s>%s</option>',
                Quform::escape($value),
                $selectedValue == $value ? ' selected="selected"' : '',
                Quform::escape($label)
            );
        }

        $output .= '</select>';

        return $output;
    }

    /**
     * Get the HTML for the responsive setting select menu
     *
     * @param   string  $id                 The ID of the field
     * @param   string  $selectedValue           The selected value
     * @param   bool    $showInheritOption  Shows the "Inherit" option if true
     * @return  string
     */
    public function getResponsiveSelectHtml($id, $selectedValue = '', $showInheritOption = true)
    {
        $options = array(
            '' => __tr('Off', 'quform'),
            'phone-portrait' => __tr('Phone portrait (479px)', 'quform'),
            'phone-landscape' => __tr('Phone landscape (767px)', 'quform'),
            'tablet-landscape' => __tr('Tablet landscape (1024px)', 'quform'),
            'custom' => __tr('Custom...', 'quform')
        );

        if ($showInheritOption) {
            $options = array('inherit' => __tr('Inherit', 'quform')) + $options;
        }

        return $this->getSelectHtml($id, $options, $selectedValue);
    }

    /**
     * Get the HTML for the element size setting select menu
     *
     * @param   string  $id                 The ID of the field
     * @param   string  $selectedValue      The selected value
     * @param   bool    $showInheritOption  Shows the "Inherit" option if true
     * @return  string
     */
    public function getSizeSelectHtml($id, $selectedValue = '', $showInheritOption = true)
    {
        $options = array(
            '' => __tr('Default', 'quform'),
            'slim' => __tr('Slim', 'quform'),
            'medium' => __tr('Medium', 'quform'),
            'fat' => __tr('Fat', 'quform'),
            'huge' => __tr('Huge', 'quform')
        );

        if ($showInheritOption) {
            $options = array('inherit' => __tr('Inherit', 'quform')) + $options;
        }

        return $this->getSelectHtml($id, $options, $selectedValue);
    }

    /**
     * Get the HTML for the field width setting select menu
     *
     * @param   string  $id                 The ID of the field
     * @param   string  $selectedValue      The selected value
     * @param   bool    $showInheritOption  Shows the "Inherit" option if true
     * @return  string
     */
    public function getFieldWidthSelectHtml($id, $selectedValue = '', $showInheritOption = true)
    {
        $options = array(
            'tiny' => __tr('Tiny', 'quform'),
            'small' => __tr('Small', 'quform'),
            'medium' => __tr('Medium', 'quform'),
            'large' => __tr('Large', 'quform'),
            '' => __tr('100% (default)', 'quform'),
            'custom' => __tr('Custom...', 'quform')
        );

        if ($showInheritOption) {
            $options = array('inherit' => __tr('Inherit', 'quform')) + $options;
        }

        return $this->getSelectHtml($id, $options, $selectedValue);
    }

    /**
     * Get the HTML for the button style setting select menu
     *
     * @param   string       $id                 The ID of the field
     * @param   string       $selectedValue      The selected value
     * @param   bool         $showInheritOption  Shows the "Inherit" option if true
     * @param   string|null  $emptyOptionText    The text for the empty option
     * @return  string
     */
    public function getButtonStyleSelectHtml($id, $selectedValue = '', $showInheritOption = true, $emptyOptionText = null)
    {
        $options = array(
            '' => is_string($emptyOptionText) ? $emptyOptionText : __tr('Default', 'quform'),
            'theme' => __tr('Use form theme button style', 'quform'),
            'sexy-silver' => __tr('Sexy Silver', 'quform'),
            'classic' => __tr('Classic', 'quform'),
            'background-blending-gradient' => __tr('Blending Gradient', 'quform'),
            'shine-gradient' => __tr('Shine Gradient', 'quform'),
            'blue-3d' => __tr('3D', 'quform'),
            'hollow' => __tr('Hollow', 'quform'),
            'hollow-rounded' => __tr('Hollow Rounded', 'quform'),
            'chilled' => __tr('Chilled', 'quform'),
            'pills' => __tr('Pill', 'quform'),
            'bootstrap' => __tr('Bootstrap', 'quform'),
            'bootstrap-primary' => __tr('Bootstrap Primary', 'quform')
        );

        if ($showInheritOption) {
            $options = array('inherit' => __tr('Inherit', 'quform')) + $options;
        }

        return $this->getSelectHtml($id, $options, $selectedValue);
    }

    /**
     * Get the HTML for the button width setting select menu
     *
     * @param   string  $id                 The ID of the field
     * @param   string  $selectedValue      The selected value
     * @param   bool    $showInheritOption  Shows the "Inherit" option if true
     * @return  string
     */
    public function getButtonWidthSelectHtml($id, $selectedValue = '', $showInheritOption = true)
    {
        $options = array(
            '' => __tr('Auto (default)', 'quform'),
            'tiny' => __tr('Tiny', 'quform'),
            'small' => __tr('Small', 'quform'),
            'medium' => __tr('Medium', 'quform'),
            'large' => __tr('Large', 'quform'),
            'full' => __tr('100%', 'quform'),
            'custom' => __tr('Custom...', 'quform')
        );

        if ($showInheritOption) {
            $options = array('inherit' => __tr('Inherit', 'quform')) + $options;
        }

        return $this->getSelectHtml($id, $options, $selectedValue);
    }

    /**
     * Get the HTML for the select icon field
     *
     * @param   string  $id        The ID of the field
     * @param   string  $selected  The selected icon
     * @return  string
     */
    public function getSelectIconHtml($id, $selected = '')
    {
        $output = '<div class="qfb-select-icon qfb-cf">';
        $output .= sprintf('<div class="qfb-select-icon-button qfb-button">%s</div>', esc_html__('Choose', 'quform'));
        $output .= '<div class="qfb-select-icon-preview">';

        if (Quform::isNonEmptyString($selected)) {
            $output .= sprintf('<i class="fa %s"></i>', esc_attr($selected));
        } else {
            $output .= esc_attr__('No icon', 'quform');
        }

        $output .= '</div>';

        $output .= sprintf(
            '<div class="qfb-select-icon-clear%s">%s</div>',
            ! Quform::isNonEmptyString($selected) ? ' qfb-hidden' : '',
            esc_html__('Clear', 'quform')
        );

        $output .= sprintf(
            '<input type="hidden" id="%s"%s class="qfb-select-icon-value">',
            esc_attr($id),
            Quform::isNonEmptyString($selected) ? sprintf(' value="%s"', esc_attr($selected)) : ''
        );

        $output .= '</div>';

        return $output;
    }

    /**
     * Get the HTML for the icon position select
     *
     * @param   string  $id                 The ID of the field
     * @param   string  $selectedValue      The selected value
     * @param   bool    $showInheritOption  Shows the "Inherit" option if true
     * @return  string
     */
    public function getIconPositionSelectHtml($id, $selectedValue = '', $showInheritOption = true)
    {
        $options = array(
            'left' => __tr('Left', 'quform'),
            'right' => __tr('Right', 'quform'),
            'above' => __tr('Above', 'quform')
        );

        if ($showInheritOption) {
            $options = array('inherit' => __tr('Inherit', 'quform')) + $options;
        }

        $output = sprintf('<select id="%s">', Quform::escape($id));

        foreach ($options as $value => $label) {
            $output .= sprintf(
                '<option value="%s"%s>%s</option>',
                Quform::escape($value),
                $selectedValue == $value ? ' selected="selected"' : '',
                Quform::escape($label)
            );
        }

        $output .= '</select>';

        return $output;
    }

    /**
     * Get the HTML for the CSS helper widget
     *
     * @return string
     */
    public function getCssHelperHtml()
    {
        $output = '';

        $helpers = array(
            array('css' => 'background-color: ;', 'icon' => 'mdi mdi-format_color_fill', 'title' => __tr('Background color', 'quform')),
            array('css' => 'background-image: url() top left no-repeat;', 'icon' => 'mdi mdi-wallpaper', 'title' => __tr('Background image', 'quform')),
            array('css' => 'border-color: ;', 'icon' => 'mdi mdi-border_color', 'title' => __tr('Border color', 'quform')),
            array('css' => 'color: ;', 'icon' => 'mdi mdi-format_color_text', 'title' => __tr('Text color', 'quform')),

            array('css' => 'padding: ;', 'icon' => 'fa fa-external-link-square', 'title' => __tr('Padding', 'quform')),
            array('css' => 'margin: ;', 'icon' => 'fa fa-external-link', 'title' => __tr('Margin', 'quform')),
            array('css' => 'border-radius: ;', 'icon' => 'mdi mdi-crop_free', 'title' => __tr('Border radius', 'quform')),

            array('css' => 'font-size: ;', 'icon' => 'mdi mdi-format_size', 'title' => __tr('Font size', 'quform')),
            array('css' => 'line-height: ;', 'icon' => 'mdi mdi-format_line_spacing', 'title' => __tr('Line height', 'quform')),
            array('css' => 'font-weight: bold;', 'icon' => 'mdi mdi-format_bold', 'title' => __tr('Bold', 'quform')),
            array('css' => 'text-decoration: underline;', 'icon' => 'mdi mdi-format_underlined', 'title' => __tr('Underline', 'quform')),
            array('css' => 'text-transform: uppercase;', 'icon' => 'mdi mdi-title', 'title' => __tr('Uppercase', 'quform')),

            array('css' => 'text-align: left;', 'icon' => 'mdi mdi-format_align_left', 'title' => __tr('Text align left', 'quform')),
            array('css' => 'text-align: center;', 'icon' => 'mdi mdi-format_align_center', 'title' => __tr('Text align center', 'quform')),
            array('css' => 'text-align: right;', 'icon' => 'mdi mdi-format_align_right', 'title' => __tr('Text align right', 'quform')),

            array('css' => 'width: ;', 'icon' => 'mdi mdi-keyboard_tab', 'title' => __tr('Width', 'quform')),
            array('css' => 'height: ;', 'icon' => 'mdi mdi-vertical_align_top', 'title' => __tr('Height', 'quform')),

            array('css' => 'display: none;', 'icon' => 'mdi mdi-visibility_off', 'title' => __tr('Hide', 'quform')),
        );

        foreach ($helpers as $helper) {
            $output .= sprintf(
                '<span class="qfb-css-helper" data-css="%s" title="%s"><i class="%s"></i></span>',
                esc_attr($helper['css']),
                esc_attr($helper['title']),
                esc_attr($helper['icon'])
            );
        }

        return $output;
    }

    /**
     * Format the given variables array to display in a <pre> tag
     *
     * @param   array   $variables
     * @return  string
     */
    public function formatVariables(array $variables)
    {
        $lines = array();

        foreach ($variables as $tag => $description) {
            $lines[] = sprintf('%s = %s', $tag, $description);
        }

        return join("\n", $lines);
    }

    /**
     * Get the array of available Quform icons
     *
     * @return array
     */
    public function getQuformIcons()
    {
        return array(
            'qicon-add_circle', 'qicon-arrow_back', 'qicon-arrow_forward', 'qicon-check', 'qicon-close',
            'qicon-remove_circle', 'qicon-schedule', 'qicon-mode_edit', 'qicon-favorite_border', 'qicon-file_upload', 'qicon-star',
            'qicon-keyboard_arrow_down', 'qicon-keyboard_arrow_up', 'qicon-send', 'qicon-thumb_down', 'qicon-thumb_up',
            'qicon-refresh', 'qicon-question-circle', 'qicon-calendar', 'qicon-qicon-star-half', 'qicon-paper-plane',
            'qicon-search'
        );
    }

    /**
     * Get the array of available FontAwesome icons
     *
     * Updated for v4.7.0
     *
     * @return array
     */
    public function getFontAwesomeIcons()
    {
        return array('fa-glass', 'fa-music', 'fa-search', 'fa-envelope-o', 'fa-heart', 'fa-star', 'fa-star-o',
            'fa-user', 'fa-film', 'fa-th-large', 'fa-th', 'fa-th-list', 'fa-check', 'fa-remove', 'fa-close',
            'fa-times', 'fa-search-plus', 'fa-search-minus', 'fa-power-off', 'fa-signal', 'fa-gear', 'fa-cog',
            'fa-trash-o', 'fa-home', 'fa-file-o', 'fa-clock-o', 'fa-road', 'fa-download', 'fa-arrow-circle-o-down',
            'fa-arrow-circle-o-up', 'fa-inbox', 'fa-play-circle-o', 'fa-rotate-right', 'fa-repeat', 'fa-refresh',
            'fa-list-alt', 'fa-lock', 'fa-flag', 'fa-headphones', 'fa-volume-off', 'fa-volume-down', 'fa-volume-up',
            'fa-qrcode', 'fa-barcode', 'fa-tag', 'fa-tags', 'fa-book', 'fa-bookmark', 'fa-print', 'fa-camera',
            'fa-font', 'fa-bold', 'fa-italic', 'fa-text-height', 'fa-text-width', 'fa-align-left', 'fa-align-center',
            'fa-align-right', 'fa-align-justify', 'fa-list', 'fa-dedent', 'fa-outdent', 'fa-indent', 'fa-video-camera',
            'fa-photo', 'fa-image', 'fa-picture-o', 'fa-pencil', 'fa-map-marker', 'fa-adjust', 'fa-tint', 'fa-edit',
            'fa-pencil-square-o', 'fa-share-square-o', 'fa-check-square-o', 'fa-arrows', 'fa-step-backward',
            'fa-fast-backward', 'fa-backward', 'fa-play', 'fa-pause', 'fa-stop', 'fa-forward', 'fa-fast-forward',
            'fa-step-forward', 'fa-eject', 'fa-chevron-left', 'fa-chevron-right', 'fa-plus-circle', 'fa-minus-circle',
            'fa-times-circle', 'fa-check-circle', 'fa-question-circle', 'fa-info-circle', 'fa-crosshairs',
            'fa-times-circle-o', 'fa-check-circle-o', 'fa-ban', 'fa-arrow-left', 'fa-arrow-right', 'fa-arrow-up',
            'fa-arrow-down', 'fa-mail-forward', 'fa-share', 'fa-expand', 'fa-compress', 'fa-plus', 'fa-minus',
            'fa-asterisk', 'fa-exclamation-circle', 'fa-gift', 'fa-leaf', 'fa-fire', 'fa-eye', 'fa-eye-slash',
            'fa-warning', 'fa-exclamation-triangle', 'fa-plane', 'fa-calendar', 'fa-random', 'fa-comment', 'fa-magnet',
            'fa-chevron-up', 'fa-chevron-down', 'fa-retweet', 'fa-shopping-cart', 'fa-folder', 'fa-folder-open',
            'fa-arrows-v', 'fa-arrows-h', 'fa-bar-chart-o', 'fa-bar-chart', 'fa-twitter-square', 'fa-facebook-square',
            'fa-camera-retro', 'fa-key', 'fa-gears', 'fa-cogs', 'fa-comments', 'fa-thumbs-o-up', 'fa-thumbs-o-down',
            'fa-star-half', 'fa-heart-o', 'fa-sign-out', 'fa-linkedin-square', 'fa-thumb-tack', 'fa-external-link',
            'fa-sign-in', 'fa-trophy', 'fa-github-square', 'fa-upload', 'fa-lemon-o', 'fa-phone', 'fa-square-o',
            'fa-bookmark-o', 'fa-phone-square', 'fa-twitter', 'fa-facebook-f', 'fa-facebook', 'fa-github', 'fa-unlock',
            'fa-credit-card', 'fa-feed', 'fa-rss', 'fa-hdd-o', 'fa-bullhorn', 'fa-bell', 'fa-certificate',
            'fa-hand-o-right', 'fa-hand-o-left', 'fa-hand-o-up', 'fa-hand-o-down', 'fa-arrow-circle-left',
            'fa-arrow-circle-right', 'fa-arrow-circle-up', 'fa-arrow-circle-down', 'fa-globe', 'fa-wrench', 'fa-tasks',
            'fa-filter', 'fa-briefcase', 'fa-arrows-alt', 'fa-group', 'fa-users', 'fa-chain', 'fa-link', 'fa-cloud',
            'fa-flask', 'fa-cut', 'fa-scissors', 'fa-copy', 'fa-files-o', 'fa-paperclip', 'fa-save', 'fa-floppy-o',
            'fa-square', 'fa-navicon', 'fa-reorder', 'fa-bars', 'fa-list-ul', 'fa-list-ol', 'fa-strikethrough',
            'fa-underline', 'fa-table', 'fa-magic', 'fa-truck', 'fa-pinterest', 'fa-pinterest-square',
            'fa-google-plus-square', 'fa-google-plus', 'fa-money', 'fa-caret-down', 'fa-caret-up', 'fa-caret-left',
            'fa-caret-right', 'fa-columns', 'fa-unsorted', 'fa-sort', 'fa-sort-down', 'fa-sort-desc', 'fa-sort-up',
            'fa-sort-asc', 'fa-envelope', 'fa-linkedin', 'fa-rotate-left', 'fa-undo', 'fa-legal', 'fa-gavel',
            'fa-dashboard', 'fa-tachometer', 'fa-comment-o', 'fa-comments-o', 'fa-flash', 'fa-bolt', 'fa-sitemap',
            'fa-umbrella', 'fa-paste', 'fa-clipboard', 'fa-lightbulb-o', 'fa-exchange', 'fa-cloud-download',
            'fa-cloud-upload', 'fa-user-md', 'fa-stethoscope', 'fa-suitcase', 'fa-bell-o', 'fa-coffee', 'fa-cutlery',
            'fa-file-text-o', 'fa-building-o', 'fa-hospital-o', 'fa-ambulance', 'fa-medkit', 'fa-fighter-jet',
            'fa-beer', 'fa-h-square', 'fa-plus-square', 'fa-angle-double-left', 'fa-angle-double-right',
            'fa-angle-double-up', 'fa-angle-double-down', 'fa-angle-left', 'fa-angle-right', 'fa-angle-up',
            'fa-angle-down', 'fa-desktop', 'fa-laptop', 'fa-tablet', 'fa-mobile-phone', 'fa-mobile', 'fa-circle-o',
            'fa-quote-left', 'fa-quote-right', 'fa-spinner', 'fa-circle', 'fa-mail-reply', 'fa-reply', 'fa-github-alt',
            'fa-folder-o', 'fa-folder-open-o', 'fa-smile-o', 'fa-frown-o', 'fa-meh-o', 'fa-gamepad', 'fa-keyboard-o',
            'fa-flag-o', 'fa-flag-checkered', 'fa-terminal', 'fa-code', 'fa-mail-reply-all', 'fa-reply-all',
            'fa-star-half-empty', 'fa-star-half-full', 'fa-star-half-o', 'fa-location-arrow', 'fa-crop', 'fa-code-fork',
            'fa-unlink', 'fa-chain-broken', 'fa-question', 'fa-info', 'fa-exclamation', 'fa-superscript',
            'fa-subscript', 'fa-eraser', 'fa-puzzle-piece', 'fa-microphone', 'fa-microphone-slash', 'fa-shield',
            'fa-calendar-o', 'fa-fire-extinguisher', 'fa-rocket', 'fa-maxcdn', 'fa-chevron-circle-left',
            'fa-chevron-circle-right', 'fa-chevron-circle-up', 'fa-chevron-circle-down', 'fa-html5', 'fa-css3',
            'fa-anchor', 'fa-unlock-alt', 'fa-bullseye', 'fa-ellipsis-h', 'fa-ellipsis-v', 'fa-rss-square',
            'fa-play-circle', 'fa-ticket', 'fa-minus-square', 'fa-minus-square-o', 'fa-level-up', 'fa-level-down',
            'fa-check-square', 'fa-pencil-square', 'fa-external-link-square', 'fa-share-square', 'fa-compass',
            'fa-toggle-down', 'fa-caret-square-o-down', 'fa-toggle-up', 'fa-caret-square-o-up', 'fa-toggle-right',
            'fa-caret-square-o-right', 'fa-euro', 'fa-eur', 'fa-gbp', 'fa-dollar', 'fa-usd', 'fa-rupee', 'fa-inr',
            'fa-cny', 'fa-rmb', 'fa-yen', 'fa-jpy', 'fa-ruble', 'fa-rouble', 'fa-rub', 'fa-won', 'fa-krw', 'fa-bitcoin',
            'fa-btc', 'fa-file', 'fa-file-text', 'fa-sort-alpha-asc', 'fa-sort-alpha-desc', 'fa-sort-amount-asc',
            'fa-sort-amount-desc', 'fa-sort-numeric-asc', 'fa-sort-numeric-desc', 'fa-thumbs-up', 'fa-thumbs-down',
            'fa-youtube-square', 'fa-youtube', 'fa-xing', 'fa-xing-square', 'fa-youtube-play', 'fa-dropbox',
            'fa-stack-overflow', 'fa-instagram', 'fa-flickr', 'fa-adn', 'fa-bitbucket', 'fa-bitbucket-square',
            'fa-tumblr', 'fa-tumblr-square', 'fa-long-arrow-down', 'fa-long-arrow-up', 'fa-long-arrow-left',
            'fa-long-arrow-right', 'fa-apple', 'fa-windows', 'fa-android', 'fa-linux', 'fa-dribbble', 'fa-skype',
            'fa-foursquare', 'fa-trello', 'fa-female', 'fa-male', 'fa-gittip', 'fa-gratipay', 'fa-sun-o', 'fa-moon-o',
            'fa-archive', 'fa-bug', 'fa-vk', 'fa-weibo', 'fa-renren', 'fa-pagelines', 'fa-stack-exchange',
            'fa-arrow-circle-o-right', 'fa-arrow-circle-o-left', 'fa-toggle-left', 'fa-caret-square-o-left',
            'fa-dot-circle-o', 'fa-wheelchair', 'fa-vimeo-square', 'fa-turkish-lira', 'fa-try', 'fa-plus-square-o',
            'fa-space-shuttle', 'fa-slack', 'fa-envelope-square', 'fa-wordpress', 'fa-openid', 'fa-institution',
            'fa-bank', 'fa-university', 'fa-mortar-board', 'fa-graduation-cap', 'fa-yahoo', 'fa-google', 'fa-reddit',
            'fa-reddit-square', 'fa-stumbleupon-circle', 'fa-stumbleupon', 'fa-delicious', 'fa-digg',
            'fa-pied-piper-pp', 'fa-pied-piper-alt', 'fa-drupal', 'fa-joomla', 'fa-language', 'fa-fax', 'fa-building',
            'fa-child', 'fa-paw', 'fa-spoon', 'fa-cube', 'fa-cubes', 'fa-behance', 'fa-behance-square', 'fa-steam',
            'fa-steam-square', 'fa-recycle', 'fa-automobile', 'fa-car', 'fa-cab', 'fa-taxi', 'fa-tree', 'fa-spotify',
            'fa-deviantart', 'fa-soundcloud', 'fa-database', 'fa-file-pdf-o', 'fa-file-word-o', 'fa-file-excel-o',
            'fa-file-powerpoint-o', 'fa-file-photo-o', 'fa-file-picture-o', 'fa-file-image-o', 'fa-file-zip-o',
            'fa-file-archive-o', 'fa-file-sound-o', 'fa-file-audio-o', 'fa-file-movie-o', 'fa-file-video-o',
            'fa-file-code-o', 'fa-vine', 'fa-codepen', 'fa-jsfiddle', 'fa-life-bouy', 'fa-life-buoy', 'fa-life-saver',
            'fa-support', 'fa-life-ring', 'fa-circle-o-notch', 'fa-ra', 'fa-resistance', 'fa-rebel', 'fa-ge',
            'fa-empire', 'fa-git-square', 'fa-git', 'fa-y-combinator-square', 'fa-yc-square', 'fa-hacker-news',
            'fa-tencent-weibo', 'fa-qq', 'fa-wechat', 'fa-weixin', 'fa-send', 'fa-paper-plane', 'fa-send-o',
            'fa-paper-plane-o', 'fa-history', 'fa-circle-thin', 'fa-header', 'fa-paragraph', 'fa-sliders',
            'fa-share-alt', 'fa-share-alt-square', 'fa-bomb', 'fa-soccer-ball-o', 'fa-futbol-o', 'fa-tty',
            'fa-binoculars', 'fa-plug', 'fa-slideshare', 'fa-twitch', 'fa-yelp', 'fa-newspaper-o', 'fa-wifi',
            'fa-calculator', 'fa-paypal', 'fa-google-wallet', 'fa-cc-visa', 'fa-cc-mastercard', 'fa-cc-discover',
            'fa-cc-amex', 'fa-cc-paypal', 'fa-cc-stripe', 'fa-bell-slash', 'fa-bell-slash-o', 'fa-trash', 'fa-copyright',
            'fa-at', 'fa-eyedropper', 'fa-paint-brush', 'fa-birthday-cake', 'fa-area-chart', 'fa-pie-chart',
            'fa-line-chart', 'fa-lastfm', 'fa-lastfm-square', 'fa-toggle-off', 'fa-toggle-on', 'fa-bicycle', 'fa-bus',
            'fa-ioxhost', 'fa-angellist', 'fa-cc', 'fa-shekel', 'fa-sheqel', 'fa-ils', 'fa-meanpath', 'fa-buysellads',
            'fa-connectdevelop', 'fa-dashcube', 'fa-forumbee', 'fa-leanpub', 'fa-sellsy', 'fa-shirtsinbulk',
            'fa-simplybuilt', 'fa-skyatlas', 'fa-cart-plus', 'fa-cart-arrow-down', 'fa-diamond', 'fa-ship',
            'fa-user-secret', 'fa-motorcycle', 'fa-street-view', 'fa-heartbeat', 'fa-venus', 'fa-mars', 'fa-mercury',
            'fa-intersex', 'fa-transgender', 'fa-transgender-alt', 'fa-venus-double', 'fa-mars-double', 'fa-venus-mars',
            'fa-mars-stroke', 'fa-mars-stroke-v', 'fa-mars-stroke-h', 'fa-neuter', 'fa-genderless',
            'fa-facebook-official', 'fa-pinterest-p', 'fa-whatsapp', 'fa-server', 'fa-user-plus', 'fa-user-times',
            'fa-hotel', 'fa-bed', 'fa-viacoin', 'fa-train', 'fa-subway', 'fa-medium', 'fa-yc', 'fa-y-combinator',
            'fa-optin-monster', 'fa-opencart', 'fa-expeditedssl', 'fa-battery-4', 'fa-battery', 'fa-battery-full',
            'fa-battery-3', 'fa-battery-three-quarters', 'fa-battery-2', 'fa-battery-half', 'fa-battery-1',
            'fa-battery-quarter', 'fa-battery-0', 'fa-battery-empty', 'fa-mouse-pointer', 'fa-i-cursor',
            'fa-object-group', 'fa-object-ungroup', 'fa-sticky-note', 'fa-sticky-note-o', 'fa-cc-jcb',
            'fa-cc-diners-club', 'fa-clone', 'fa-balance-scale', 'fa-hourglass-o', 'fa-hourglass-1',
            'fa-hourglass-start', 'fa-hourglass-2', 'fa-hourglass-half', 'fa-hourglass-3', 'fa-hourglass-end',
            'fa-hourglass', 'fa-hand-grab-o', 'fa-hand-rock-o', 'fa-hand-stop-o', 'fa-hand-paper-o',
            'fa-hand-scissors-o', 'fa-hand-lizard-o', 'fa-hand-spock-o', 'fa-hand-pointer-o', 'fa-hand-peace-o',
            'fa-trademark', 'fa-registered', 'fa-creative-commons', 'fa-gg', 'fa-gg-circle', 'fa-tripadvisor',
            'fa-odnoklassniki', 'fa-odnoklassniki-square', 'fa-get-pocket', 'fa-wikipedia-w', 'fa-safari', 'fa-chrome',
            'fa-firefox', 'fa-opera', 'fa-internet-explorer', 'fa-tv', 'fa-television', 'fa-contao', 'fa-500px',
            'fa-amazon', 'fa-calendar-plus-o', 'fa-calendar-minus-o', 'fa-calendar-times-o', 'fa-calendar-check-o',
            'fa-industry', 'fa-map-pin', 'fa-map-signs', 'fa-map-o', 'fa-map', 'fa-commenting', 'fa-commenting-o',
            'fa-houzz', 'fa-vimeo', 'fa-black-tie', 'fa-fonticons', 'fa-reddit-alien', 'fa-edge', 'fa-credit-card-alt',
            'fa-codiepie', 'fa-modx', 'fa-fort-awesome', 'fa-usb', 'fa-product-hunt', 'fa-mixcloud', 'fa-scribd',
            'fa-pause-circle', 'fa-pause-circle-o', 'fa-stop-circle', 'fa-stop-circle-o', 'fa-shopping-bag',
            'fa-shopping-basket', 'fa-hashtag', 'fa-bluetooth', 'fa-bluetooth-b', 'fa-percent', 'fa-gitlab',
            'fa-wpbeginner', 'fa-wpforms', 'fa-envira', 'fa-universal-access', 'fa-wheelchair-alt',
            'fa-question-circle-o', 'fa-blind', 'fa-audio-description', 'fa-volume-control-phone', 'fa-braille',
            'fa-assistive-listening-systems', 'fa-asl-interpreting', 'fa-american-sign-language-interpreting',
            'fa-deafness', 'fa-hard-of-hearing', 'fa-deaf', 'fa-glide', 'fa-glide-g', 'fa-signing', 'fa-sign-language',
            'fa-low-vision', 'fa-viadeo', 'fa-viadeo-square', 'fa-snapchat', 'fa-snapchat-ghost', 'fa-snapchat-square',
            'fa-pied-piper', 'fa-first-order', 'fa-yoast', 'fa-themeisle', 'fa-google-plus-circle',
            'fa-google-plus-official', 'fa-fa', 'fa-font-awesome', 'fa-handshake-o', 'fa-envelope-open',
            'fa-envelope-open-o', 'fa-linode', 'fa-address-book', 'fa-address-book-o', 'fa-vcard', 'fa-address-card',
            'fa-vcard-o', 'fa-address-card-o', 'fa-user-circle', 'fa-user-circle-o', 'fa-user-o', 'fa-id-badge',
            'fa-drivers-license', 'fa-id-card', 'fa-drivers-license-o', 'fa-id-card-o', 'fa-quora', 'fa-free-code-camp',
            'fa-telegram', 'fa-thermometer-4', 'fa-thermometer', 'fa-thermometer-full', 'fa-thermometer-3',
            'fa-thermometer-three-quarters', 'fa-thermometer-2', 'fa-thermometer-half', 'fa-thermometer-1',
            'fa-thermometer-quarter', 'fa-thermometer-0', 'fa-thermometer-empty', 'fa-shower', 'fa-bathtub',
            'fa-s15', 'fa-bath', 'fa-podcast', 'fa-window-maximize', 'fa-window-minimize', 'fa-window-restore',
            'fa-times-rectangle', 'fa-window-close', 'fa-times-rectangle-o', 'fa-window-close-o', 'fa-bandcamp',
            'fa-grav', 'fa-etsy', 'fa-imdb', 'fa-ravelry', 'fa-eercast', 'fa-microchip', 'fa-snowflake-o',
            'fa-superpowers', 'fa-wpexplorer', 'fa-meetup'
        );
    }
}
