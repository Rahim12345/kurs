<?php

namespace App\Http\Controllers;
use App\Http\Models\User;

class UserController
{
    public function index()
    {

       $users = User::get();

       return view('users.index' , compact('users'));

    }
}