<?php

namespace App\Services;




class SettingOfDataBaseService
{

    public function connectionToDataBase()
    {
        global $wpdb;


       return $wpdb = new Wpdb( 'root', 'q', 'weeklyex_wp126', 'localhost' );
    }


}