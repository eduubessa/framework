<?php

namespace App\Helpers\Classes\Database;

abstract class Model extends Builder {

    protected string $primaryKey = "id";
    protected string $table;

    abstract public function create();
    abstract public function save();
    abstract public function update();
    abstract public function delete();

}