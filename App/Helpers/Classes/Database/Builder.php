<?php

namespace App\Helpers\Classes\Database;

use PDO;

abstract class Builder extends Connection
{
    protected mixed $connection;

    protected string $table;

    public function __construct()
    {
        if(is_null($this->table) or $this->table === ''){
            $this->table(get_called_class());
        }
    }

    protected function select()
    {
        try {

        }catch(\PDOException $exception) {

        }
    }
}