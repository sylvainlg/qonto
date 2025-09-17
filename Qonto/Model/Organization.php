<?php

namespace neyric\Qonto\Model;

class Organization
{
    public string $slug;

    /**
     * @var BankAccount[]
     */
    public array $bank_accounts;
}