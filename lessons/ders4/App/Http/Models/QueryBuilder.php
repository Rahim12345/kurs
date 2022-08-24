<?php

namespace App\Http\Models;



use function MongoDB\BSON\toJSON;

class QueryBuilder
{
    private $whereArr   = [];
    private $query;
    private $counter    = 0;
    private $model;
    private $columns;
    private $limit;
    private $offset;
    private $toJson;

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
        $result = $execute->fetchAll( \PDO::FETCH_CLASS, get_class($this->model));
        if($this->toJson)
            $result = json_encode($result);
        return $result;
    }

    public function first()
    {

        $this->limit(1);
        $execute = $this->toSql();
        return $execute->fetchObject(get_class($this->model));
    }

    public function firstOrFail()
    {
        $result = $this->first();
        return $result  ? $result : '404';
    }

    public function find($value)
    {
        $this->where($this->model->getPrimaryKey() , '=' , $value );
        return $this->first();
    }

    public function today()
    {
        $this->where( 'DATE(created_at)' , date('Y-m-d')  );
        return $this;
    }

    public function select($columns = [])
    {
        $this->columns = implode(',',$columns);

        return $this;
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
                    $whereSql .= " AND $line";
                }

            }
            $this->query .= ' where ' . $whereSql;
        }

    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    private function toSql()
    {
        $this->query = "SELECT ".($this->columns ? $this->columns : '*')." from ".$this->model->getTableName();

        $this->compileWhere();

        if($this->limit)
        {
            $this->query.= ' limit '.$this->limit;
            if($this->offset)
                $this->query .= ' offset ' .$this->offset;
        }

        $db = Database::getInstance();

        $stat = $db ->prepare($this->query);

        $stat->execute( isset($this->whereArr['conditions']['args']) ? $this->whereArr['conditions']['args'] : []);

        return $stat;
    }

    public function dd()
    {
        $this->toSql();
        var_dump($this->query , $this->whereArr);
        exit;
    }

    public function toJson()
    {
        $this->toJson = true;
        return $this;
    }

}