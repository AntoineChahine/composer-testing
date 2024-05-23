<?php

namespace TeeLaunch\Services\Platforms;

use Exception;
use TeeLaunch\Services\BaseService;

class PlatformStoreProductVariants extends BaseService
{
    /**
     * @throws Exception
     */
    public function unlinkPlatformProductVariants($id)
    {
        $url = "$this->baseUri/stores/products/variants/${id}/unlink";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 404) {
            throw new Exception("Platform product variant with ID $id not found");
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function ignorePlatformProductVariants($id)
    {
        $url = "$this->baseUri/stores/products/variants/${id}/ignore";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 404) {
            throw new Exception("Platform product variant with ID $id not found");
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function unignorePlatformProductVariants($id)
    {
        $url = "$this->baseUri/stores/products/variants/${id}/unignore";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 404) {
            throw new Exception("Platform product variant with ID $id not found");
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error');
        }

        return null;
    }
}
