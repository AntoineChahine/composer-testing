<?php

namespace TeeLaunch\Services\Accounts;

use Exception;
use JsonException;
use TeeLaunch\Services\BaseService;

class AccountService extends BaseService
{
    /**
     * @throws JsonException
     * @throws Exception
     */
    public function getAccount()
    {
        $url = "$this->baseUri/account";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->get();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 500) {
            throw new Exception('Internal server Error');
        }

        return null;
    }
}
