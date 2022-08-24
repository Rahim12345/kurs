<?php

spl_autoload_register('loader');

/**
 * @throws Exception
 */
function loader($className)
{
    $fileName = $className . '.php';
    if (!file_exists($fileName)) {
        throw new \Exception($className .' classı tapılmadı');
    }
    require_once $fileName;
}
