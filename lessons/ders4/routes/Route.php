<?php

namespace Framework\Routes;

class Route
{

    public static function get( $uri , $callback)
    {
        if( ! is_callable($callback))
            throw new \Exception('call');


        if(is_array($callback))
            $callback = [new $callback[0],$callback[1]];

        $res = call_user_func_array($callback,[$_GET]);

        echo $res;
        exit;
    }

    public static function post( $uri , \Closure $callback)
    {

    }
}