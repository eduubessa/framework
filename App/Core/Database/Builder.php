<?php

namespace App\Core\Database;

use PDO;

abstract class Builder extends Connection
{
    protected mixed $connection;

    protected string $table;

    public function __construct()
    {
        if (is_null($this->table) or $this->table === '') {
            $this->table(get_called_class());
        }
    }

    protected static function select(string|array $columns = "*")
    {
        try {

            if (is_null($this->table) || $this->table == '') {
                throw new \PDOException("No table");
            }

            $this->query = "SELECT ";

            if (func_num_args() == 1) {
                if (is_array($columns)){
                    foreach ($columns as $key => $column) {
                        $this->query .= (count($column) <= ($key-1)) ? "{$column}, " : "{$column}";
                    }
                }
            }elseif(func_num_args() > 1){
                foreach(func_get_args() as $key => $column){
                    $this->query .= (count($column) <= ($key-1)) ? "{$column}, " : "{$column}";
                }
            }

            $this->query = " FROM {$this->table}";

        } catch (\PDOException $exception) {

        }
    }
}