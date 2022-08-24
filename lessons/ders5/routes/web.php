<?php

use App\Http\Controllers\UserController;
use Framework\Routes\Route;



Route::get('/users', [ UserController::class ,'index' ] );
//
//
//Route::post('/users', function (){});
//Route::any('/users' ,[UserController::class ,'index']  );
Route::post('/users', function (){
    echo 'users/123 url';
});
//Route::post('/post_url', function (){});

