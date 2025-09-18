<?php

namespace neyric\Qonto\Core;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Uid\Uuid;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{
    public HttpClientInterface $httpClient; // public to be easily overriden in tests

    /**
     * ApiClient constructor
     */
    public function __construct(
        string $login,
        string $secretKey,
        private string $baseUrl
    ) {
        $this->httpClient = HttpClient::create([
            'headers' => [
                'Authorization' => self::getAuthorizationValue($login, $secretKey),
                'Content-Type' => 'application/json',
                'X-Qonto-Idempotency-Key' => Uuid::v4()->toRfc4122()
            ]
        ]);
    }


    /**
     * @param array<string, mixed> $queryParameters
     */
    public function getRequest(string $url, array $queryParameters = []): ResponseInterface
    {
        return $this->httpClient->request('GET', $url, [
            'query' => $queryParameters
        ]);
    }

    public function getRequestPOST(string $url, mixed $body_parameters): ResponseInterface{
        return $this->httpClient->request('POST', $url, [
            'body' => $body_parameters
        ]);
    }

    
    static function getAuthorizationValue(string $login, string $secretKey): string {
        return $login . ':' . $secretKey;
    }

}