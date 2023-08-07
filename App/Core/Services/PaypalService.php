<?php

namespace App\Core\Services;

use GuzzleHttp\Client;

class PaypalService {

    private string $client_id;
    private string $client_secret;

    public function __construct()
    {
        $this->client_id = config('services.paypal.client_id');
        $this->client_secret = config('services.paypal.client_secret');

        dd($this->client_secret);
    }


}