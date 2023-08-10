<?php

namespace App\Core\Database;

class DB extends Builder {

    protected string $table = "";

    public function test(string $name)
    {


        return "hello world";
    }

}