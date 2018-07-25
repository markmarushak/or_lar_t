<?php

namespace App\Services\ConnectToDataBaseService;

use App\Plugins\WordPress\Wpdb;

class ConnectToDataBase
{
    private $username;
    private $password;
    private $database;
    private $host;

    public function __construct($username, $password, $database, $host)
    {
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
            $this->host = $host;
            $this->connectionToDataBase();
    }


    public function connectionToDataBase()
    {
        global $wpdb;
        try
        {
            if ($wpdb = new Wpdb(
                $this->username,
                $this->password,
                $this->database,
                $this->host
            ))
            {
                return true;
            }
            else
            {
                throw new Exception('Unable to connect');
            }
        }
        catch(Exception $e)
        {
            return $e;
        }
    }



}