<?php

use App\User;

include 'autoload.php';

echo '<pre>';
$users = User::where('name','test')->where('id','>' ,5)->get();



//echo  call_user_func_array([ new \App\QueryBuilder(), 'all'] , []);

//$arr = [1,2,3];
//
//$newArr = array_map(function ($item){
//    return $item*2;
//},$arr);
//
//$newFil = array_filter($arr , [\App\QueryBuilder::class , 'filt']);
//
//
//var_dump($newFil);













