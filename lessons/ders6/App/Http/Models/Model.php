<?php

namespace App\Http\Models;

class Model
{
    private $builder;
    public function __construct()
    {
        $this->builder = new QueryBuilder($this);
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this->builder,$name)){
            return call_user_func_array([$this->builder,$name],...$arguments);
        }
    }

    public function __get($name)
    {
        return property_exists($this , $name) ? $this->$name : null;
    }

    public static function __callStatic($name, $arguments)
    {
        return (new static())->$name($arguments);
    }

    public function getTableName()
    {
        if(  isset($this->tableName) )
            return $this->tableName;

        $className = explode('\\',get_class($this));
        return strtolower(end($className)) . 's';
    }

    public function getPrimaryKey()
    {
        return isset($this->primaryKey) ? $this->primaryKey : 'id';
    }

}