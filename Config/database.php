<?php

return [

    "mysql" => [

        "driver" => "mysql",

        "port" => env('DB_PORT', 3306),

        "hostname" => env('DB_HOSTNAME', "localhost"),

        "username" => env('DB_USERNAME', 3306),

        "password" => env('DB_PASSWORD', ""),

        "dbname" => env('DB_DATABASE', ""),

        "encode" => env("DB_ENCODE", "utf8mb4"),

        "prefix" => env("DB_PREFIX", "")
    ],

    "mysqli" => [
        "driver" => "mysqli",

        "port" => 3306,

        "hostname" => "localhost//mysql",

        "username" => "root",

        "password" => "password",

        "dbname" => "database_name",

        "encode" => "utf8mb4",

        "prefix" => ""
    ]

];