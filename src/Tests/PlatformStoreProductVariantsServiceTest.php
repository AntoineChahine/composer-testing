<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Platforms\PlatformStoreProductVariants;
use TeeLaunch\TeeLaunchConfig;

class PlatformStoreProductVariantsServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testUnlinkPlatformStoreProductVariants(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductVariantService = new PlatformStoreProductVariants();
        $result = $platformStoreProductVariantService->unlinkPlatformProductVariants(990);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testIgnorePlatformStoreProductVariants(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductVariantService = new PlatformStoreProductVariants();
        $result = $platformStoreProductVariantService->ignorePlatformProductVariants(990);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testUnignorePlatformStoreProductVariants(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformStoreProductVariantService = new PlatformStoreProductVariants();
        $result = $platformStoreProductVariantService->unignorePlatformProductVariants(990);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
