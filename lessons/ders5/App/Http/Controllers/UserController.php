<?php

namespace App\Http\Controllers;
use App\Http\Models\User;

class UserController
{
    public function index()
    {
        echo 123;
       $users = User::get();
       return view('users.index' , compact('users'));
    }

    public function test2()
    {
        return 'az';
    }
}