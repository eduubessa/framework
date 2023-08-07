<?php

use App\Core\Config\Config;

function dd($value)
{
    echo json_encode($value);
    exit(0);
}

function config($argument): string
{
    $configuration = null;
    $arguments = explode('.', $argument);

    if(!file_exists(__dir__. '/../../Config/'. $arguments[0] .'.php')){
        exit(0);
    }

    $conf = require_once(__dir__. '/../../Config/'. $arguments[0] .'.php');
    $configuration = $conf;
    $arguments = array_slice($arguments, 1);

    foreach($arguments as $arg)
    {
        if(is_array($configuration) && array_key_exists($arg, $configuration)) {
            $configuration = $configuration[$arg];
        }else{
            $configuration = $conf;
        }
    }

    return $configuration;
}