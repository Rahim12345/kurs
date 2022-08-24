<?php

namespace Framework\Routes;

class RouteHandle
{
    public static $methods = [ 'GET' ,'POST' ];

    public static function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getRequestPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function run()
    {
//        self::getRequestPath();
        if(in_array(self::getRequestMethod() , self::$methods))
        {
            if(array_key_exists(self::getRequestMethod() , Route::getRoute()) )
            {
                foreach (Route::getRoute()[self::getRequestMethod()] as $obj)
                {
                    if( $obj->find() )
                    {
                        $result = $obj->callFunc();
                        echo $result;
                        break;
                    }
                }
                exit;
            }else{
                die('exit2');
            }
        }else{
            die('exit');
        }

    }
}