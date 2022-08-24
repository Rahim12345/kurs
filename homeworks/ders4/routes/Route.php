<?php

namespace Framework\Routes;

class Route
{
    public static function parse_url()
    {
        $dirName        = dirname($_SERVER['SCRIPT_NAME']);                             //      /homeworks/ders4
        $baseName       = basename($_SERVER['SCRIPT_NAME']);                            //      index.php
        $requestUri     = $_SERVER['REQUEST_URI'];                                      //      /homeworks/ders4/index.php
        $requestUri     = str_replace([$dirName,$baseName],null,$requestUri);   //      /

        return $requestUri;
    }

    public static function get($url,$callback)
    {
        $requestUri = self::parse_url();
        if (preg_match('@^'.$url.'$@',$requestUri,$parametrs))
        {
//            var_dump($parametrs);
//            exit;
            if(is_array($callback))
            {
                if (method_exists(new $callback[0],$callback[1])){
                    return call_user_func_array([new $callback[0],$callback[1]],$parametrs);
                }
                else
                {
                    die('<b>'.$callback[1].'</b>'.' methodu '.'<b>'.$callback[0].'</b>'.' classının methodu deyil :((');
                }
            }
            else
            {
                call_user_func_array($callback,$parametrs);
            }
        }
    }
}