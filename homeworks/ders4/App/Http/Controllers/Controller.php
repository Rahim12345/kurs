<?php

namespace App\Http\Controllers;

class Controller
{
    public function view($name, $data = [])
    {
        extract($data);
        require_once './resources/views/'.$name.'.php';
    }
}