<?php

namespace TeeLaunch\Services\Orders;

use Exception;
use TeeLaunch\Services\BaseService;

class OrdersService extends BaseService
{
    /**
     * @throws Exception
     */
    public function getOrders($status, $limit, $page)
    {
        $url = "$this->baseUri/orders";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->Params(['status' => $status, 'limit' => $limit, 'page' => $page])
            ->get();

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 404) {
            throw new \Exception('No orders founded!');
        }

        if ($statusCode === 422) {
            throw new \Exception('Unprocessable entity!');
        }

        if ($statusCode === 500) {
            throw new \Exception('Internal server error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function storeOrder($payload)
    {

        $url = "$this->baseUri/orders";

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

        if ($statusCode === 400) {
            throw new Exception('No product exists with the variant id provided!');
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable Entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;

    }

    /**
     * @throws Exception
     */
    public function getOrderById($id)
    {
        $url = "$this->baseUri/orders/${id}";

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

    /**
     * @throws Exception
     */
    public function cancelOrderById($id)
    {
        $url = "$this->baseUri/orders/${id}/cancel";

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

        if ($statusCode === 400) {
            throw new Exception('Order status must be on hold or pending to be canceled!');
        }

        if ($statusCode === 404) {
            throw new Exception("Order with ID $id not found");
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable Entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function releaseOrderById($id)
    {
        $url = "$this->baseUri/orders/${id}/release";

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

        if ($statusCode === 400) {
            throw new Exception('Order status must be on hold or pending to be canceled!');
        }

        if ($statusCode === 404) {
            throw new Exception("Order with ID $id not found");
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function holdOrderById($id)
    {
        $url = "$this->baseUri/orders/${id}/hold";

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

        if ($statusCode === 400) {
            throw new Exception('Order status must be pending to be set on hold!');
        }

        if ($statusCode === 404) {
            throw new Exception("Order with ID $id not found");
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function createOrderPro($payload)
    {

        $url = "$this->baseUri/orders/pro";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post($payload);

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 201) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable Entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;

    }

    /**
     * @throws Exception
     */
    public function getOrderCost($payload)
    {

        $url = "$this->baseUri/orders/cost";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post($payload);

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 201) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable Entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;

    }

    /**
     * @throws Exception
     */
    public function getBlankOrderCost($payload)
    {

        $url = "$this->baseUri/orders/blank-cost";

        $response = $this->requestBuilder
            ->url($url)
            ->log($this->logger)
            ->Bearer($this->bearerToken)
            ->Headers(['Accept: application/json'])
            ->post($payload);

        $statusCode = $response['statusCode'];

        $responseBody = $response['body'];

        if ($statusCode === 200) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 201) {
            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode === 422) {
            throw new Exception('Unprocessable Entity');
        }

        if ($statusCode === 500) {
            throw new Exception('Internal Server Error');
        }

        return null;

    }

    /**
     * @throws Exception
     */
    public function getShipmentByOrderId($id)
    {
        $url = "$this->baseUri/orders/${id}/shipments";

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

    /**
     * @throws Exception
     */
    public function getShipmentByOrderLineItemId($id)
    {
        $url = "$this->baseUri/orders/line-item/${id}/shipments";

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

    /**
     * @throws Exception
     */
    public function getShipmentByPlatformOrderId($id)
    {
        $url = "$this->baseUri/orders/platform/${id}/shipments";

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
