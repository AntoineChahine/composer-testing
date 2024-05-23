<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Platforms\PlatformStoreProductsService;
use TeeLaunch\TeeLaunchConfig;

class PlatformStoreProductsServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetPlatformStoreProducts(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductsService = new PlatformStoreProductsService();
        $result = $platformStoreProductsService->getPlatformStoreProduct(100000000004, 5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetPlatformStoreProductById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductsService = new PlatformStoreProductsService();
        $result = $platformStoreProductsService->getPlatformStoreProductsById(100000000004, 144347);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testIgnorePlatformStoreProductById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductsService = new PlatformStoreProductsService();
        $result = $platformStoreProductsService->ignorePlatformStoreProductsById(100000000004, 144347);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testUnignorePlatformStoreProductById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductsService = new PlatformStoreProductsService();
        $result = $platformStoreProductsService->unignorePlatformStoreProductsById(100000000004, 144347);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
