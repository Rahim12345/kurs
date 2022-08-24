<?php

use App\Models\User;

require __DIR__.'/vendor/autoload.php';

$data   = User::setName('Rahim')->setAge(28)->setPhone('+994775829989')->getData();

echo '<pre>';

print_r($data);


$user=User::get();
