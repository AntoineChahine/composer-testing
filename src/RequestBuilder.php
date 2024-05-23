<?php

namespace TeeLaunch;

use TeeLaunch\Logger\SdkLogger;

class RequestBuilder
{
    private string $url;

    private string $method;

    private array $headers = [];

    private array $queryParams = [];

    private array $payload = [];

    private string $contentType = 'application/json';

    private string $bearerToken;

    private SdkLogger $logger;

    public static function create(): RequestBuilder
    {
        return new self();
    }

    public function url($url): static
    {
        $this->url = $url;

        return $this;
    }

    public function bearer($token): static
    {
        $this->bearerToken = $token;

        return $this;
    }

    public function headers(array $headers): static
    {
        $this->headers = $headers;

        return $this;
    }

    public function params(array $queryParams): static
    {
        $this->queryParams = $queryParams;

        return $this;
    }

    public function get(): array
    {
        $this->method = 'GET';

        return $this->sendRequest();
    }

    public function post($payload = null): array
    {
        $this->method = 'POST';

        if ($payload !== null) {
            $this->payload = $payload;
        }

        return $this->sendRequest();
    }

    public function put($payload)
    {
        $this->method = 'PUT';
        $this->payload = $payload;

        return $this->sendRequest();
    }

    public function delete(): array
    {
        $this->method = 'DELETE';

        return $this->sendRequest();
    }

    public function log($logger): static
    {
        $this->logger = $logger;

        return $this;
    }

    private function sendRequest(): array
    {
        $this->logger->info('Bearer Token: '.$this->bearerToken);

        if (empty($this->bearerToken)) {
            $this->logger->error('Bearer Token is missing');

            return [
                'statusCode' => 400,
                'error' => 'Bearer Token is missing',
            ];
        }

        $url = $this->url.'?'.http_build_query($this->queryParams);

        $this->logger->info('URL: '.$url);

        $ch = curl_init($url);

        $curlOptions = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array_merge($this->headers, ['Authorization: Bearer '.$this->bearerToken]),
            CURLOPT_TIMEOUT => 30,
        ];

        if (in_array($this->method, ['POST', 'PUT'])) {

            // Set the method
            $curlOptions[CURLOPT_CUSTOMREQUEST] = $this->method;

            // Manually build the request body string in JSON format
            $requestBody = json_encode($this->payload);

            // Set the request body
            $curlOptions[CURLOPT_POSTFIELDS] = $requestBody;

            // Set the contentType
            $curlOptions[CURLOPT_HTTPHEADER][] = 'Content-Type: '.$this->contentType;
        }

        curl_setopt_array($ch, $curlOptions);

        $responseBody = curl_exec($ch);

        if ($responseBody === false) {
            $this->logger->error('cURL Error: '.curl_error($ch));
            $httpCode = 500;
            $responseBody = 'Internal Server Error';
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }

        curl_close($ch);

        $this->logger->info('HTTP Response: '.$responseBody);
        $this->logger->info('HTTP Response Code: '.$httpCode);

        return [
            'statusCode' => $httpCode,
            'body' => $responseBody,
        ];
    }
}
