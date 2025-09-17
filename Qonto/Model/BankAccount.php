<?php

namespace neyric\Qonto\Model;

class BankAccount
{
    public string $slug;

    public string $iban;

    public string $bic;

    public string $currency;

    public float $balance;

    public int $balance_cents;

    public float $authorized_balance;

    public int $authorized_balance_cents;
}