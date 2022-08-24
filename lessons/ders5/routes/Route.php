<?php

namespace Framework\Routes;

class Route
{
    private static $route = [];

    public static function get( $uri , $callback)
    {

        self::setRoute( "GET" , $uri , $callback );

//        if( ! is_callable($callback))
//            throw new \Exception('call');
//
//
//        if(is_array($callback))
//            $callback = [new $callback[0],$callback[1]];

//        $res = call_user_func_array($callback,[$_GET]);

    }

    public static function post( $uri , $callback)
    {
        self::setRoute( "POST" , $uri , $callback );
    }
    public static function any( $uri , $callback)
    {
        self::setRoute( "ANY" , $uri , $callback );
    }

    private static function setRoute($requestMethod , $uri , $callback )
    {
        self::$route[ $requestMethod ][$uri] = new RouteParser($requestMethod , $uri , $callback);
    }

    public static function getRoute()
    {
        return self::$route;
    }

}