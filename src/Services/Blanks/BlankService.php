<?php

namespace TeeLaunch\Services\Blanks;

use Exception;
use TeeLaunch\Services\BaseService;

class BlankService extends BaseService
{
    /**
     * @throws Exception
     */
    public function getBlanks($limit, $page)
    {
        $url = "$this->baseUri/blanks";

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
     * @throws Exception
     */
    public function getBlankById($id)
    {
        $url = "$this->baseUri/blanks/${id}";

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
            throw new \Exception('Internal server error!');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function createProductByBlankId($blankId, $payload)
    {

        $url = "$this->baseUri/blanks/${blankId}/create";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post($payload);

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 201) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 404) {
            throw new Exception("Blank with ID $blankId not found");
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable entity');
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error!');
        }

        return null;

    }
}
