<?php

namespace TeeLaunch\Services\Accounts;

use Exception;
use TeeLaunch\Services\BaseService;

class AccountSettings extends BaseService
{
    /**
     * @throws Exception
     */
    public function getAccountSettings($searchKey, $limit, $page)
    {
        $url = "$this->baseUri/account/settings";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->Params(['search_key' => $searchKey, 'limit' => $limit, 'page' => $page])
            ->get();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($searchKey === null || $searchKey === '') {
            throw new Exception('Please enter your settings specific key');
        }

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 500) {
            throw new Exception('Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function getAccountSettingsById($id)
    {
        $url = "$this->baseUri/account/settings/${id}";

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

        if ($statusCode === 404) {
            throw new Exception("Account settings with ID $id not found");
        }

        if ($statusCode === 500) {
            throw new Exception('Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function updateAccountSettingsById($accountId, $payload)
    {
        $url = "$this->baseUri/account/settings/${accountId}";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->put($payload);

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 404) {
            throw new Exception("Account settings with ID $accountId not found");
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server error');
        }

        return null;
    }
}
