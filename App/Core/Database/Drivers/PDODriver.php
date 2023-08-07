<?php

namespace App\Core\Database\Drivers;

class PDODriver {

    protected string $driver;
    protected string $hostname;
    protected string $username;
    protected string $password;
    protected string $dbname;

    protected static string $query;

    protected function start_connection()
    {
        $this->connection = new \PDO($this->driver. ":". $this->hostname, $this->username, $this->password);
    }

    protected static function select(array|string $columns = "*"): PDODriver
    {
        self::$query = "SELECT ";

        if(func_num_args() > 1){
            foreach(func_get_args() as $key => $column) {
                self::$query .= (func_num_args() < ($key-1)) ? "{$column}, " : $column;
            }
        }else if(is_array($columns)){
            foreach($columns as $key => $column) {
                self::$query .= (count($columns) < ($key-1)) ? "{$column}, " : $column;
            }
        }else{
            self::$query .= $columns;
        }

        self::$query .= " FROM `{TABLE}`";
    }

}