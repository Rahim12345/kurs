<?php

namespace App\Http\Models;

use PDO;
use PDOException;

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
            try{
                $this->db = new PDO('mysql:host=localhost;dbname=birlik', 'root', '');
//                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die("Failed to connect to DB: ". $e->getMessage());
            }
        }
        return $this->db;
    }
}