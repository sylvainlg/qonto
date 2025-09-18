<?php

namespace neyric\Qonto\Core;

use neyric\Qonto\QontoApi;

/**
 * Base class for Qonto API managers
 */
abstract class ApiResource
{
    /**
     * @param QontoApi $api
     */
    public function __construct(protected QontoApi $api)
    {
    }

    /**
     * @param string $path
     * @param array<string, mixed> $queryParameters
     * 
     * @return array<string, mixed>
     */
    protected function fetch(string $path, array $queryParameters = []): array
    {
        $url = $this->api->baseUrl . $path;
        $response = $this->api->client->getRequest($url, $queryParameters);

        return $response->toArray();
    }

    /**
     * @param string $path
     * @param array<string, mixed> $bodyParameters
     *
     * @return array<string, mixed>
     */
    protected function post(string $path, array $bodyParameters = []): array
    {
        $url = $this->api->baseUrl . $path;
        $response = $this->api->client->getRequestPOST($url, $bodyParameters);

        return $response->toArray();
    }

    /**
     * @param array<string, mixed> $data
     * @param string $class
     * 
     * @return mixed
     */
    protected function denormalize(array $data, string $class): mixed
    {
        return $this->api->serializer->denormalize($data, $class);
    }
}