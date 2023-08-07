<?php

use App\Models\Customer;

if(file_exists(__DIR__ . '/vendor/autoload.php')){
    require_once __DIR__ . '/vendor/autoload.php';
}

$customer = new Customer();
echo $customer->create();