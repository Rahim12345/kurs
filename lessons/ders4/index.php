<?php


use App\Http\Models\Role;
use App\Http\Models\User;

include __DIR__.'/vendor/autoload.php';
include __DIR__.'/include.php';



//$users = User::where('name','Fizuli')->where('id','>' ,2)->select(['name','email'])->get();
//$users = User::where('id','>',2)->select(['name','email'])->first();
//$users = User::find(2)->toJson();
//$users = User::today()->get();
//
//if( gettype($users) == 'string')
//{
//    echo $users;
//}else{
//    var_dump($users);
//}

//$role = Role::get();
//var_dump($role);
//exit;