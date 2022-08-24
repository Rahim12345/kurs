<?php

namespace App\test;

class User
{

    public static $instance;
    private function __construct()
    {

    }

    /**
     * @return User
     */
    public static function getInstance()
    {
        if( self::$instance != null)
        {
            return self::$instance;
        }
        self::$instance = new User();
        return self::$instance;
    }

    /**
     * @return User
     */
    public static function where()
    {
        $ins = self::getInstance();

        return self::getInstance();
    }

    public static function all()
    {
        return self::getInstance();
    }



}