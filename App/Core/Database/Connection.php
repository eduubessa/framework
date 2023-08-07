<?php

namespace App\Core\Database;

use App\Core\Database\Drivers\PDODriver;

class Connection extends PDODriver
{
    protected string $driver = "mysql";
    protected string $hostname;
    protected string $username;
    protected string $password;
    protected string $dbname;

    private string $tablePrefix;

    private mixed $connection;

    private string $connection_name = "default";

    public function __construct()
    {
        $configuration = config('database.'. $this->connection_name);

        $this->driver = $configuration['driver'];
        $this->hostname = $configuration['hostname'];
        $this->username = $configuration['username'];
        $this->password = $configuration['password'];


        $this->getAllDrivers();
    }

    public function connection(string $name): void
    {
        $this->connection_name = $name;
    }

    private function getAllDrivers()
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