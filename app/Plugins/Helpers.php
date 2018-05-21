<?php

namespace App\Plugins;

use App\Plugins\WP_Hook;


class Helpers
{
    public $WP_Hook;

    public function __construct()
    {
        $this->WP_Hook = new WP_Hook;
    }

   public function apply_filters( $tag, $value ) {
        global $wp_filter, $wp_current_filter;

        $args = array();

        // Do 'all' actions first.
        if ( isset($wp_filter['all']) ) {
            $wp_current_filter[] = $tag;
            $args = func_get_args();
            $this->WP_Hook->_wp_call_all_hook($args);
        }

        if ( !isset($wp_filter[$tag]) ) {
            if ( isset($wp_filter['all']) )
                array_pop($wp_current_filter);
            return $value;
        }

        if ( !isset($wp_filter['all']) )
            $wp_current_filter[] = $tag;

        if ( empty($args) )
            $args = func_get_args();

        // don't pass the tag name to WP_Hook
        array_shift( $args );

        $filtered = $wp_filter[ $tag ]->WP_Hook->apply_filters( $value, $args );

        array_pop( $wp_current_filter );

        return $filtered;
    }




}