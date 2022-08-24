<?php

spl_autoload_register('loader');

/**
 * @throws Exception
 */
function loader($className){
    $path = $className . '.php';
    if (!file_exists($path)){
        throw new \Exception($path.' tapilmadi');
    }

    require_once $path;
}