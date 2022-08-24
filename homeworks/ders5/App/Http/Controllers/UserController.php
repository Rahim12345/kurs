<?php

namespace App\Http\Controllers;
use App\Http\Models\User;

class UserController
{
    public function index()
    {
        echo 123;
        die('1222');
       $users = User::get();
       return view('users.index' , compact('users'));


    }
}