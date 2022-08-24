<?php

namespace App\Http\Models;

class QueryBuilder
{
    private $whereArr   = [];
    private $query;
    private $counter    = 0;
    private $model;
    private $columns;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function where( $column , $operator = '=' , $value = false )
    {
        if( $value === false )
        {
            $value = $operator;
            $operator = '=';
        }


        $this->whereArr['conditions']['where'][$this->counter]   = " $column $operator ? ";
        $this->whereArr['conditions']['args'][$this->counter] = $value;
        $this->counter++;

        return $this;
    }

    public function get()
    {

        $execute = $this->toSql();
        return $execute->fetchAll( \PDO::FETCH_CLASS, get_class($this->model));
    }

    public function first()
    {

        $execute = $this->toSql();
        return $execute->fetchObject(get_class($this->model));
    }

    public function firstOrFail()
    {

        $execute = $this->toSql();
        $result =  $execute->fetchObject( get_class($this->model) );
        return $result  ? $result : '404';
    }

    public function find($value)
    {
        $this->where($this->model->primaryKey , '=' , $value );
        return $this->first();
    }

    public function select($columns = [])
    {
        $this->columns = implode(',',$columns);

        return $this;
    }

    private function toSql()
    {
        $this->query = "SELECT ".($this->columns ? $this->columns : '*')." from ".$this->model->tableName ;

        $this->compileWhere();

        $db = Database::getInstance();

        $stat = $db ->prepare($this->query);

        $stat->execute( isset($this->whereArr['conditions']['args']) ? $this->whereArr['conditions']['args'] : []);

        return $stat;
    }

    private function compileWhere()
    {
        $whereSql = '';
        if( array_key_exists('conditions' , $this->whereArr) )
        {
            foreach ($this->whereArr['conditions']['where'] as $key=>$line)
            {
                if(!$key)
                {
                    $whereSql .= $line;
                }else{
                    $whereSql.= " AND $line";
                }

            }
        }
        $this->query .= ' where ' . $whereSql;

    }
}