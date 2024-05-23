<?php

namespace TeeLaunch\Services\Platforms;

use Exception;
use TeeLaunch\Services\BaseService;

class PlatformStoreProductsService extends BaseService
{
    /**
     * @throws Exception
     */
    public function getPlatformStoreProduct($platformStoreId, $limit, $page)
    {
        $url = "$this->baseUri/stores/${platformStoreId}/products";

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

        if ($statusCode === 404) {
            throw new Exception("Platform store with ID $platformStoreId not found");
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function getPlatformStoreProductsById($platformStoreId, $productId)
    {
        $url = "$this->baseUri/stores/${platformStoreId}/products/${productId}";

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
            throw new Exception("Platform store with ID $platformStoreId and product with ID $productId not found");
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function ignorePlatformStoreProductsById($platformStoreId, $productId)
    {
        $url = "$this->baseUri/stores/${platformStoreId}/products/${productId}/ignore";

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
            throw new Exception("Platform store with ID $platformStoreId and product with ID $productId not found");
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function unignorePlatformStoreProductsById($platformStoreId, $productId)
    {
        $url = "$this->baseUri/stores/${platformStoreId}/products/${productId}/unignore";

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
            throw new Exception("Platform store with ID $platformStoreId and product with ID $productId not found");
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }
}
