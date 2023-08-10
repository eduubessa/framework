<?php

use App\Models\User;

if(file_exists(__dir__ . '/vendor/autoload.php')) {
    require_once __dir__ . '/vendor/autoload.php';
}



$user = new User;
$user->username = "Eduardo Bessa";
$user->email = "eduubessa@gmail.com";
$user->password = "passwordApenas@teste";
$user->save();