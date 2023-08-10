<?php

namespace App\Core\Database;

use PDO;
use App\Core\Database\Connection;

class Builder extends Connection
{
    private static string $table;
    protected static string $query = "";

    protected static Connection $connection;

    public static function table(string $name): static
    {
        self::$table = $name;

        return new static();
    }

    public static function connection($name): static
    {
        $connection = new Connection();
        $connection->setConnection($name);

        return new static();
    }

    public static function insert(array $data)
    {
        self::$query = "INSERT INTO ". self::$table ." (";

        foreach(array_keys($data) as $i => $column)
        {
            self::$query .= (count($data)-1) > $i ? "{$column}, " : "$column";
        }

        self::$query .= ") VALUES (";

        foreach(array_values($data) as $i => $value)
        {
            self::$query .= (count($data)-1) > $i ? "?, " : "?";
        }

        self::$query .= ");";

        echo self::$query;
    }

    public static function select(array|string $columns = "*"): static
    {
        self::$query = "SELECT ";

        if (func_num_args() == 1) {
            if (is_array($columns)) {
                foreach ($columns as $key => $column) {
                    self::$query .= (count($columns) - 1) > $key ? "{$column}, " : "{$column} ";
                }
            } else {
                self::$query .= $columns;
            }
        } elseif (func_num_args() == 3) {
            foreach (func_get_args() as $key => $column) {
                self::$query .= (func_num_args() - 1) > $key ? "{$column}, " : "{$column} ";
            }
        } else {
            self::$query .= $columns;
        }

        self::$query .= " FROM " . self::$table;

        return new static();
    }

    public static function join(string $table, string $column, string $table2, string $column2): static
    {
        if(str_contains(self::$query, "SELECT")){
            self::$query .= "JOIN `{$table2}` ON {$table}.{$column} = {$table2}.{$column2}";
        }

        return new static();
    }

    public static function leftJoin(string $table, string $column, string $table2, string $column2): static
    {
        if(str_contains(self::$query, "SELECT")){
            self::$query .= "LEFT JOIN `{$table2}` ON {$table}.{$column} = {$table2}.{$column2}";
        }

        return new static();
    }

    public static function innerJoin(string $table, string $column, string $table2, string $column2): static
    {
        if(str_contains(self::$query, "SELECT")){
            self::$query .= "INNER JOIN `{$table2}` ON {$table}.{$column} = {$table2}.{$column2}";
        }

        return new static();
    }

    public static function rightJoin(string $table, string $column, string $table2, string $column2): static
    {
        if(str_contains(self::$query, "SELECT")){
            self::$query .= "RIGHT JOIN `{$table2}` ON {$table}.{$column} = {$table2}.{$column2}";
        }

        return new static();
    }


    public static function where(string $column, string|int $value): static
    {
        if (!str_contains(self::$query, "WHERE")) {
            if (func_num_args() == 2) {
                self::$query .= " WHERE " . $column . " = ";
                self::$query .= is_string($value) ? "'{$value}'" : "{$value}";
            } elseif (func_num_args() == 3) {
                self::$query .= " WHERE " . func_get_args()[0] . " " . func_get_args()[1] . " ";
                self::$query .= is_string(func_get_args()[2]) ? " '" . func_get_args()[2] . "'" : func_get_args()[2];
            }
        } else {
            if (func_num_args() == 2) {
                self::$query .= " AND " . $column . " = ";
                self::$query .= is_string($value) ? "'{$value}'" : "{$value}";
            } elseif (func_num_args() == 3) {
                self::$query .= " AND " . func_get_args()[0] . " " . func_get_args()[1] . " ";
                self::$query .= is_string(func_get_args()[2]) ? " '" . func_get_args()[2] . "'" : func_get_args()[2];
            }
        }

        return new static();
    }

    public static function orWhere(string $column, string|int $value): static
    {
        if (str_contains(self::$query, "WHERE")) {
            if (func_num_args() == 2) {
                self::$query .= " OR " . $column . " = ";
                self::$query .= is_string($value) ? " '{$value}'" : "{$value}";
            } elseif (func_num_args() == 3) {
                self::$query .= " OR " . func_get_args()[0] . " " . func_get_args()[1] . " ";
                self::$query .= is_string(func_get_args()[2]) ? "'" . func_get_args()[2] . " '" : func_get_args()[2];
            }
        } else {
            // TODO: Try catch
        }

        return new static();
    }

    public static function update(array $data): void
    {

        if(str_contains(self::$query, "WHERE")) {

            $where = self::$query;

            self::$query = " UPDATE " . self::$table . " SET ";

            foreach (array_keys($data) as $i => $column) {
                self::$query .= (count($data) - 1) > $i ? "{$column} = ?, " : "$column = ?";
            }

            self::$query .= $where .";";

            echo self::$query;
        }
    }

    public static function delete()
    {
        if(str_contains(self::$query, "WHERE")) {
            $where = self::$query;
            self::$query = "DELETE FROM ". self::$table ." ". $where. ";";
        }

        echo self::$query;
    }

    public static function raw(string $query): void
    {
        self::$query = $query;
    }

    public static function execute(): void
    {
        self::$query .= ";";
    }
}