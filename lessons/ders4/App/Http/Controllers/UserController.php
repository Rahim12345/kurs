<?php

namespace App\Http\Controllers;
use App\Http\Models\User;

class UserController
{
    public function index($get)
    {

        var_dump($get);
        exit;
        $users = User::get();

        return 123;
    }
}