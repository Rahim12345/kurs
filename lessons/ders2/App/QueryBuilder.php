<?php

namespace App;

class QueryBuilder
{

    private $model;
    private $whereArr = [];

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function get()
    {

        $this->execute();
    }

    public function find($value)
    {
        
    }

    public function first()
    {
        
    }
    
    public function limit($limit)
    {
        
    }

    public function offset($offset)
    {
        
    }

    public function select( $select )
    {
        
    }

    public function orderBy()
    {
        
    }

    public function where( $column , $operator = '=' , $value = false )
    {
        if( $value === false )
        {
            $value = $operator;
            $operator = '=';
        }

        $this->whereArr[] = [$column , $operator , $value ];
        return $this;
    }

    public function generateSql()
    {
        
    }

    public function execute()
    {

        $db = Database::getInstance();
        $db = Database::getInstance();
        $db = Database::getInstance();
        $db = Database::getInstance();
        $db = Database::getInstance();
    }
    
    private function fetch()
    {
        
    }

    private function fetchAll()
    {
        
    }
    

}