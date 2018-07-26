<?php

namespace App\Plugins\WordPress;

class NOOP_Translations
{
    var $entries = array();
    var $headers = array();

    function add_entry($entry)
    {
        return true;
    }

    /**
     *
     * @param string $header
     * @param string $value
     */
    function set_header($header, $value)
    {
    }

    /**
     *
     * @param array $headers
     */
    function set_headers($headers)
    {
    }

    /**
     * @param string $header
     * @return false
     */
    function get_header($header)
    {
        return false;
    }

    /**
     * @param Translation_Entry $entry
     * @return false
     */
    function translate_entry(&$entry)
    {
        return false;
    }

    /**
     * @param string $singular
     * @param string $context
     */
    function translate($singular, $context = null)
    {
        return $singular;
    }

    /**
     *
     * @param int $count
     * @return bool
     */
    function select_plural_form($count)
    {

        return 1 == $count ? 0 : 1;
    }

    /**
     * @return int
     */
    function get_plural_forms_count()
    {
        return 2;
    }

    /**
     * @param string $singular
     * @param string $plural
     * @param int $count
     * @param string $context
     */
    function translate_plural($singular, $plural, $count, $context = null)
    {
        return 1 == $count ? $singular : $plural;
    }

    /**
     * @param object $other
     */
    function merge_with(&$other)
    {
    }
}