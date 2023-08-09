<?php

use App\Core\Config\Config;
use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($value)
{
    echo json_encode($value);
    exit(0);
}

function config($argument): mixed
{
    $arguments = explode('.', $argument);

    if (!file_exists(__dir__ . '/../../Config/' . $arguments[0] . '.php')) {
        exit(0);
    }

    $configuration = include __dir__ . '/../../Config/' . $arguments[0] . '.php';
    $arguments = array_slice($arguments, 1);

    foreach ($arguments as $arg) {
        if (array_key_exists($arg, $configuration)) {
            $configuration = $configuration[$arg];
        } else if (is_string($configuration) || is_int($configuration) || is_bool($configuration)) {
            return $configuration;
        }
    }

    return $configuration;
}

function env(string $key, string|int $default = null)
{
    return array_key_exists($key, $_ENV) ? $_ENV[$key] : $default;
}