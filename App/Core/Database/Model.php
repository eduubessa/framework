<?php

namespace App\Core\Database;

abstract class Model
{
    protected mixed $connection;
    protected string $table;
    protected string $primaryKey;
    protected string $keyType = 'int';
    public bool $incrementing = true;
    protected array $with = [];
    protected int $perPage = 15;
    public bool $exists = false;
    public bool $wasRecentlyCreated = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public static function create(array $data)
    {
        return "Create data from User Model";
    }

    public static function find(int $id)
    {
        return "Get row from id";
    }

    public static function get(): string
    {
        return "Fetch Get from " . str_replace('App\Models\\', '', get_called_class()) . " Model";
    }

    public static function all(): string
    {
        return "Fetch All from " . str_replace('App\Models\\', '', get_called_class()) . " Model";
    }

    public function save()
    {
        $database = new DB();

        if ($this->table == "") {
            $this->table .= strtolower(str_replace("App\Models\\", "", get_called_class()));
        }

        foreach ($this as $name => $value) {
            echo $name . " = " . $value . "<br />";
        }

        Builder::table('users')->select()->execute();
    }

}