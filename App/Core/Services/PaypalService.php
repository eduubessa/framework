<?php

namespace App\Core\Services;

class PaypalService {

    private string $api_key;

    public function __construct()
    {
        $this->api_key = config('services.paypal.api_key');
    }


}