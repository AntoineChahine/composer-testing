<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Orders\OrdersService;
use TeeLaunch\TeeLaunchConfig;

class OrdersServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetOrders(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->getOrders('all', 5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testStoreOrder(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();

        $payload = [
            'details' => [
                'email' => 'user@example.com',
                'phone' => '1234567890',
                'firstName' => 'John',
                'lastName' => 'Doe',
                'address1' => '123 Main St',
                'address2' => 'Apt 456',
                'city' => 'City',
                'state' => 'State',
                'zip' => '12345',
                'country' => 'Country',
                'platformStoreName' => 'Store Name',
            ],
            'items' => [
                [
                    'variant_id' => '990',
                    'quantity' => '5',
                ],
            ],
        ];

        $result = $ordersService->storeOrder($payload);

        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetOrdersById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->getOrderById(1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testCancelOrdersById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->cancelOrderById(100000016244);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testReleaseOrdersById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->releaseOrderById(100000016230);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testHoldOrdersById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->holdOrderById(100000016232);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testCreateOrderPro(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();

        $payload = [
            'label' => 1010,
            'name' => 'test api product',
            'email' => 'tarik@teelaunch.com',
            'firstName' => 'tarek',
            'lastName' => 'ibrahim',
            'phone' => '81646800',
            'address1' => '123 Main St',
            'address2' => 'Apt 4B',
            'city' => 'Cityville',
            'state' => 'CA',
            'zip' => '12345',
            'country' => 'US',
            'variants' => [
                [
                    'id' => '990',
                    'images' => [
                        [
                            'url' => 'https://teelaunch-2.s3.us-west-2.amazonaws.com/accounts/3/products/100000544685/art-files/649065/Hoodie_CarolinaBlue_XL_LeftChest_Chloe.png',
                            'stage' => 'Front Shirt',
                        ],
                    ],
                    'quantity' => 1,
                    'TextPersonalizer' => '',
                ],
            ],
        ];

        $result = $ordersService->createOrderPro($payload);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetOrderCost(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();

        $payload = [
            'countryCode' => 'US',
            'productVariants' => [
                [
                    'id' => 990,
                    'quantity' => 1,
                ],
            ],
        ];

        $result = $ordersService->getOrderCost($payload);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetBlankOrderCost(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();

        $payload = [
            'countryCode' => 'US',
            'blankVariants' => [
                [
                    'id' => 990,
                    'quantity' => 1,
                ],
            ],
        ];

        $result = $ordersService->getBlankOrderCost($payload);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetShipmentByOrderId(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->getShipmentByOrderId(100000016244);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetShipmentByOrderLineItemId(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->getShipmentByOrderLineItemId(1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetShipmentByPlatformId(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $ordersService = new OrdersService();
        $result = $ordersService->getShipmentByPlatformOrderId(1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
