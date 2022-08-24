<?php

spl_autoload_register(function ($className) {
    $file = $className . '.php';
    myInclude($file);
});

function myInclude($file)
{
    if (file_exists($file)) {
        include $file;
    } else {
        throw new \Exception('tapilmadi');
    }
}
