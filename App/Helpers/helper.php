<?php

use App\Core\Config\Config;

function dd($value)
{
    echo json_encode($value);
    exit(0);
}

function config($argument): array
{
    $arguments = explode('.', $argument);
    $filename = $arguments[0];
    $arguments = array_slice($arguments, 1);


    if(file_exists(__dir__. '/../../Config/'. $filename .'.php')){
        $configuration = require_once(__dir__. '/../../Config/'. $filename .'.php');
    }

    foreach($arguments as $argument) {
        if(array_key_exists($argument, $configuration)){
            $configuration = $configuration[$argument];
        }else{
            $configuration = [];
        }
    }

    return $configuration;
}