<?php

namespace App\Core\Payment;

interface Payment {

    const TYPE_BALANCE = "PAYMENT::TYPE::BALANCE";
    CONST TYPE_DEBIT_CARD = "PAYMENT::TYPE::DEBIT_CARD";
    const TYPE_CREDIT_CARD = "PAYMENT::TYPE::CREDIT_CARD";

    const STATUS_FAILED = "PAYMENT::STATUS::FAILED";
    const STATUS_WAITING = "PAYMENT::STATUS::WAITING";
    const STATUS_SUCCESS = "PAYMENT::STATUS::SUCCESS";

    public function id(string $value);
    public function tax(int|float $value = 0);
    public function totalWithoutTax(int|float $value = 0);
    public function total(int|float $value = 0);
    public function country(string $code);
    public function process();

    public function pay();

}