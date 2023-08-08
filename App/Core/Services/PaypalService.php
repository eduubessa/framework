<?php

namespace App\Core\Services;

use GuzzleHttp\Client;
use http\Client\Request;
use Http\Message\Body;
use http\QueryString;

class PaypalService
{

    private string $base_url;
    private string|int $client_id;
    private string|int $client_secret;
    private string $access_token;

    private Client $client;

    public function __construct()
    {
        $this->client = new Client();

        $this->base_url = config('services.payments.paypal.base_url');
        $this->client_id = config('services.payments.paypal.client_id');
        $this->client_secret = config('services.payments.paypal.client_secret');

        $this->authenticate();
    }

    private function authenticate(): void
    {
        $response = $this->client->post("{$this->base_url}/v1/oauth2/token", [
            "headers" => [
                "Accept" => "application/json",
                "Content-Type" => "application/x-www-form-urlencoded"
            ],
            "auth" => [$this->client_id, $this->client_secret],
            "form_params" => [
                "grant_type" => "client_credentials"
            ]
        ]);

        if ($response->getStatusCode()) {
            $result = json_decode($response->getBody()->getContents(), true);
            $this->access_token = $result["access_token"];
        }
    }

    public function invoice($type = "draft")
    {
        $response = $this->client->post("{$this->base_url}/v2/invoicing/invoices", [
            "headers" => [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Prefer: return=representation",
                "Authorization" => "Bearer {$this->access_token}",
            ],
            "json" => [
                "detail" => [
                    "invoice_number" => "#ct123",
                    "reference" => "deal-ref",
                ],
                "invoicer" => [
                    "name" => [
                        "given_name" => "Eduardo",
                        "surname" => "Bessa"
                    ],
                    "address" => [
                        "address_line_1" => "First address 1",
                        "admin_area_1" => "No available",
                        "admin_area_2" => "CA",
                        "postal_code" => "98765",
                        "country_code" => "US"
                    ],
                    "edu@creativeteam.dev"
                ],
                "primary_recipients" => [
                    "billing_info" => [
                        "name" => [
                            "given_name" => "Orlando",
                            "surname" => "Mayer"
                        ],
                        "address" => [
                            "address_line_1" => "First address 1",
                            "admin_area_1" => "No available",
                            "admin_area_2" => "CA",
                            "postal_code" => "98765",
                            "country_code" => "US"
                        ]
                    ]
                ]
            ]
        ]);

        if ($response->getStatusCode()) {
            $result = json_decode($response->getBody()->getContents(), true);
            $this->access_token = $result["access_token"];
        }
    }
}