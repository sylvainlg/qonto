<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class QontoApiTest extends TestCase
{

    function test_QontoApiConstruct(): void
    {
        $client = new QontoApi('login', 'secretKey');

        $this->assertNotNull($client);
    }

}