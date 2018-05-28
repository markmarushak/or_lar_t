<?php

namespace App\Plugins\QformLibrary\Quform;

use App\Plugins\QformLibrary\Quform;

/**
 * @copyright Copyright (c) 2009-2018 ThemeCatcher (http://www.themecatcher.net)
 */
class Quform_Confirmation
{
    /**
     * @var array
     */
    protected $config = array();

    /**
     * @var Quform_Form
     */
    protected $form;

    /**
     * @param  array        $config
     * @param  Quform_Form  $form
     */
    public function __construct(array $config, Quform_Form $form)
    {
        $this->setConfig($config);
        $this->form = $form;
    }

    /**
     * Get the data for the form processor
     *
     * @return array
     */
    public function getData()
    {
        return array(
            'type' => $this->config('type'),
            'message' => $this->getMessage(),
            'messageIcon' => $this->config('messageIcon'),
            'messagePosition' => $this->config('messagePosition'),
            'messageTimeout' => $this->config('messageTimeout'),
            'redirectUrl' => esc_url_raw($this->getRedirectUrl()),
            'redirectDelay' => $this->config('redirectDelay'),
            'hideForm' => $this->config('hideForm'),
            'resetForm' => $this->config('resetForm')
        );
    }

    /**
     * Get the confirmation message
     *
     * @return string
     */
    public function getMessage()
    {
        $message = $this->config('message');

        if ($this->config('messageAutoFormat')) {
            $message = nl2br($message);
        }

        $message = $this->form->replaceVariables($message, 'html');
        $message = do_shortcode($message);

        $message = apply_filters('quform_confirmation_message', $message, $this, $this->form);
        $message = apply_filters('quform_confirmation_message_' . $this->getIdentifier(), $message, $this, $this->form);

        return $message;
    }

    /**
     * Get the confirmation redirect URL
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        $url = '';

        switch ($this->config('type')) {
            case 'redirect-page':
            case 'message-redirect-page':
                $url = get_permalink($this->config('redirectPage'));
                break;
            case 'redirect-url':
            case 'message-redirect-url':
                $url = $this->form->replaceVariables($this->config('redirectUrl'), 'rawurl');
                break;
        }

        if (Quform::isNonEmptyString($this->config('redirectQuery'))) {
            $query = explode('&', $this->config('redirectQuery'));

            foreach ($query as $part) {
                $parameter = explode('=', $part);

                if (count($parameter) == 1) {
                    $url = add_query_arg(
                        $this->form->replaceVariables($parameter[0], 'url'),
                        '',
                        $url
                    );
                } else if (count($parameter) == 2) {
                    $url = add_query_arg(
                        $this->form->replaceVariables($parameter[0], 'url'),
                        $this->form->replaceVariables($parameter[1], 'url'),
                        $url
                    );
                }
            }
        }

        $url = apply_filters('quform_confirmation_redirect_url', $url, $this, $this->form);
        $url = apply_filters('quform_confirmation_redirect_url_' . $this->getIdentifier(), $url, $this, $this->form);

        return $url;
    }

    /**
     * Get the confirmation unique ID
     *
     * @return string
     */
    public function getIdentifier()
    {
        return sprintf('%d_%d', $this->form->getId(), $this->config('id'));
    }

    /**
     * Returns the config value for the given $key
     *
     * @param   string  $key
     * @param   null    $default
     * @return  mixed   The config value or $default if not set
     */
    public function config($key, $default = null)
    {
        $value = Quform::get($this->config, $key, $default);

        if ($value === null) {
            $value = Quform::get(call_user_func(array(get_class($this), 'getDefaultConfig')), $key, $default);
        }

        return $value;
    }

    /**
     * Set the config value for the given $key
     *
     * @param   string  $key
     * @param   mixed   $value
     * @return  $this
     */
    public function setConfig($key, $value = null)
    {
        if (is_array($key)) {
            foreach($key as $k => $v) {
                $this->config[$k] = $v;
            }
        } else {
            $this->config[$key] = $value;
        }

        return $this;
    }

    /**
     * Get the default confirmation configuration
     *
     * @return array
     */
    public static function getDefaultConfig()
    {
        return apply_filters('quform_default_confirmation', array(
            'name' => '',
            'enabled' => true,
            'type' => 'message',
            'message' => '',
            'messageAutoFormat' => true,
            'messageIcon' => '',
            'messagePosition' => 'above',
            'messageTimeout' => '10',
            'redirectPage' => '',
            'redirectUrl' => '',
            'redirectQuery' => '',
            'redirectDelay' => '3',
            'logicAction' => true,
            'logicMatch' => 'all',
            'logicRules' => array(),
            'hideForm' => false,
            'resetForm' => ''
        ));
    }
}