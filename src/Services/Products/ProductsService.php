<?php

namespace TeeLaunch\Services\Products;

use Exception;
use TeeLaunch\Services\BaseService;

class ProductsService extends BaseService
{
    /**
     * @throws Exception
     */
    public function getProducts($limit, $page)
    {
        $url = "$this->baseUri/products";

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

        if ($statusCode === 400) {
            throw new Exception('Bad request');
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function getProductById($productId)
    {
        $url = "$this->baseUri/products/${productId}";

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
            throw new Exception("Product with ID $productId not found");
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }
}
