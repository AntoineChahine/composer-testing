<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Platforms\PlatformStoresService;
use TeeLaunch\TeeLaunchConfig;

class PlatformStoreServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetPlatformStores(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreService = new PlatformStoresService();
        $result = $platformStoreService->getPlatformStores(5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetPlatformStoreById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreService = new PlatformStoresService();
        $result = $platformStoreService->getPlatformStoreById(100000000004);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
