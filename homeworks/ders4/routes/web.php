<?php

use App\Http\Controllers\UserController;
use Framework\Routes\Route;

Route::get('/', [ UserController::class,'index']);

Route::get('/test', function (){
    echo 'test';
});

Route::get('/about', function (){
    echo 'about';
});

Route::get('/users/parol-deyisdir', function ($name){

});