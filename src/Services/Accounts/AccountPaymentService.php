<?php

namespace TeeLaunch\Services\Accounts;

use Exception;
use JsonException;
use TeeLaunch\Services\BaseService;

class AccountPaymentService extends BaseService
{
    /**
     * @throws Exception|JsonException
     */
    public function getAccountPayments($limit, $page)
    {
        $url = "$this->baseUri/account/payment-history";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->Params(['limit' => $limit, 'page' => $page])
            ->get();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }
        if ($statusCode === 500) {
            throw new \Exception('Internal server error!');
        }

        return null;
    }

    /**
     * @throws Exception|JsonException
     */
    public function getAccountPaymentById($id)
    {
        $url = "$this->baseUri/account/payment-history/${id}";

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
            throw new \Exception("Account payment with ID $id not found");
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error!');
        }

        return null;
    }
}
