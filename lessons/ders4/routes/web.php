<?php

use App\Http\Controllers\UserController;
use Framework\Routes\Route;

Route::get('users', [ UserController::class,'index']);