<?php

namespace App\Helpers\Traits;

trait Log {

    public static function debug($message)
    {
        echo "Debug:  {$message}". PHP_EOL;
    }

    public static function warn($message)
    {
        echo "Warning: {$message}". PHP_EOL;
    }

    public static function danger($message)
    {
        echo "Danger: {$message}". PHP_EOL;
    }

}