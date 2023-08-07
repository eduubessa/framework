<?php

namespace App\Core\Payment\Services;

use App\Core\Payment\Payment;
use App\Core\Services\PaypalService;

class Paypal extends PaypalService implements Payment {

    private string $id;
    private float|int $tax;
    private float|int $total;
    private string $country;
    private int|float $totalWithoutTax;

    public function id(string $value)
    {
        $this->id = $value;
    }

    public function tax(float|int $value = 0)
    {
        // TODO: Implement tax() method.
        $this->tax = $value;
    }

    public function totalWithoutTax(float|int $value = 0)
    {
        // TODO: Implement totalWithoutTax() method.
        $this->totalWithoutTax = $value;
    }

    public function total(float|int $value = 0)
    {
        // TODO: Implement value() method.
        $this->total = $value;
    }

    public function country(string $code)
    {
        // TODO: Implement country() method.
        $this->country = $code;
    }

    public function process()
    {
        // TODO: Implement process() method.
    }

    public function pay()
    {
        // TODO: Implement pay() method.
    }
}