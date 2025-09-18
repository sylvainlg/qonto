<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class ApiOrganizationsTest extends TestCase
{

    function test_QontoApiOrganizations(): void
    {
        $qonto = new QontoApi('login', 'secretKey');

        // Setup a MockHttpClient for the api client
        $jsonData = [
            'organization' => [
                'slug' => 'acme-corp-1111',
                'bank_accounts' => [
                    [
                        'slug' => 'acme-corp-1111-bank-account-1',
                        'iban' => 'FR123456789',
                        'bic' => 'QNTOFRP1XXX',
                        'currency' => 'EUR',
                        'balance' => 72130.64,
                        'balance_cents' => 7213064,
                        'authorized_balance' => 2134.12,
                        'authorized_balance_cents' => 213412,
                    ]
                ]
            ]
        ];
        $responses = [
            new MockResponse((string) json_encode($jsonData)),
        ];
        $qonto->client->httpClient = new MockHttpClient($responses);
        

        $organization = $qonto->Organizations->get('organization-id');

        $this->assertNotNull($organization);
        $this->assertEquals('acme-corp-1111', $organization->slug);
        $this->assertEquals('acme-corp-1111-bank-account-1', $organization->bank_accounts[0]->slug);
        $this->assertEquals(7213064, $organization->bank_accounts[0]->balance_cents);
    }

}