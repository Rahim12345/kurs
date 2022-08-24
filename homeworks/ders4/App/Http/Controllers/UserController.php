<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index($paramters)
    {
        $this->view('index',[
           'ad'=>'Rahim',
           'soyad'=>'Süleymanov'
       ]);
    }

    public function passwordChange($parametrs)
    {
        die($parametrs);
        return $this->view('passwordChange',[
            'ad'=>'Rahim',
            'soyad'=>'Süleymanov'
        ]);
    }
}