<?php

namespace App\Models;

use App\Core\Database\Model;
use App\Helpers\Traits\Log;

class Customer extends Model {

    use Log;

    protected string $table = "customers";
}