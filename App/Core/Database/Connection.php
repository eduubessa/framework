<?php

namespace App\Core\Database;

use App\Core\Database\Drivers\PDODriver;

class Connection extends PDODriver
{
    protected string $driver = "mysql";
    protected int $port = 3306;
    protected string $hostname;
    protected string $username;
    protected string $password;
    protected string $dbname;

    private string $tablePrefix;

    private mixed $connection;

    private string $connection_name = "mysql";

    public function __construct()
    {

        $this->connection_name = env('DB_CONNECTION', 'mysql');
        $this->driver   = config('database.'. $this->connection_name .'.driver');
        $this->port     = config('database.'. $this->connection_name .'.port');
        $this->hostname = config('database.'. $this->connection_name .'.hostname');
        $this->username = config('database.'. $this->connection_name .'.username');
        $this->password = config('database.'. $this->connection_name .'.password');
        $this->dbname   = config('database.'. $this->connection_name .'.dbname');

        $this->getAllDrivers();
    }

    public function connection(string $name): void
    {
        $this->connection_name = $name;
    }

    private function getAllDrivers(): void
    {
        if(in_array($this->driver, \PDO::getAvailableDrivers())){
            $this->start_connection();
        }elseif(extension_loaded($this->driver)){
            echo "Brevemente";
        }else{
            echo "No driver valid";
        }

    }

    public function teste()
    {
        echo $this->connection_name. PHP_EOL;
    }

}