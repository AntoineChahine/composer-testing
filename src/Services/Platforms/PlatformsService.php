<?php

namespace TeeLaunch\Services\Platforms;

use Exception;
use TeeLaunch\Services\BaseService;

class PlatformsService extends BaseService
{
    /**
     * @throws Exception
     */
    public function getPlatforms($limit, $page)
    {
        $url = "$this->baseUri/platforms";

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
            throw new \Exception('Internal server error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function getPlatformById($id)
    {
        $url = "$this->baseUri/platforms/${id}";

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
            throw new Exception('Internal Server Error');
        }

        return null;
    }
}
