<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Products\ProductsService;
use TeeLaunch\TeeLaunchConfig;

class ProductsServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetPlatforms(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $productService = new ProductsService();
        $result = $productService->getProducts(5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetPlatformById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $productService = new ProductsService();
        $result = $productService->getProductById(122);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
