<?php

spl_autoload_register('loader');

/**
 * @throws Exception
 */
function loader($className){
    if(strpos($className,'Framework\Routes') !== false)
    {
        $className = str_replace('Framework\Routes','routes',$className);
    }

    $path = $className . '.php';
    if (!file_exists($path)){
        throw new \Exception($path.' tapilmadi');
    }

    require_once $path;
}