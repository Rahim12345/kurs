<?php


function view( $name , $data = [] )
{

}

function requireToVariable($file){
    ob_start();
    require($file);
    return ob_get_clean();
}