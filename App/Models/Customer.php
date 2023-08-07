<?php

namespace App\Models;

use App\Helpers\Classes\Database\Model;
use App\Helpers\Traits\Log;

class Customer extends Model {

    use Log;

    protected string $table = "customers";

    public function create(): string
    {
        // TODO: Implement create() method.
        return "Create new customer with data. Table {$this->table}";
    }

    public function save(): string
    {
        // TODO: Implement save() method.
        return "Create new or update customer data. Table {$this->table}";
    }

    public function update(): string
    {
        // TODO: Implement update() method.
         return "Update customer data. Table {$this->table}";
    }

    public function delete(): string
    {
        // TODO: Implement delete() method.
        return "Drop customer from id. Table {$this->table}";
    }
}