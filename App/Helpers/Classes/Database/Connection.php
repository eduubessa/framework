<?php

namespace App\Helpers\Classes\Database;

use PDO;

class Connection
{
    private string $hostname;
    private string $username;
    private string $password;
    private string $dbname;

    private string $tablePrefix;

    protected int $fetchMode = PDO::FETCH_OBJ;

    private mixed $connection;





}