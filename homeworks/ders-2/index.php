<?php


use App\Http\Models\User;

include __DIR__.'/vendor/autoload.php';

echo '<pre>';

//$users = User::where('name','Fizuli')->where('id','>' ,2)->select(['name','email'])->get();
$users = User::where('id','>',2)->select(['name','email'])->first();


var_dump($users);

exit;