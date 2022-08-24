<?php

namespace App;

class Model
{
    /**
     * @var QueryBuilder
     */
    private $builder;

    public function __construct()
    {
        $this->builder = new QueryBuilder($this);
    }

    public function __call($name, $arguments)
    {
        if( method_exists($this->builder , $name) )
        {
            return call_user_func_array([$this->builder , $name] , ...$arguments );
        }
    }

    public static function __callStatic($name, $arguments)
    {
        return (new static())->$name($arguments);
    }
}