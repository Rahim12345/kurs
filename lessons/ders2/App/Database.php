<?php

namespace App;

class Database
{

    private static $instance;
    private $db;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if( is_null( self::$instance ) )
        {
            self::$instance = new Database();
        }
        return (self::$instance)->getPDOConnection();
    }

    private  function getPDOConnection()
    {
        if( is_null($this->db) )
        {
            $this->db= new \PDO('mysql:host=localhost;dbname=kurs','root','');
        }
        return $this->db;
    }
}