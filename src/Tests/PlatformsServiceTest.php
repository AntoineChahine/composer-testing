<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Platforms\PlatformsService;
use TeeLaunch\TeeLaunchConfig;

class PlatformsServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetPlatforms(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformsService = new PlatformsService();
        $result = $platformsService->getPlatforms(5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetPlatformById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $platformsService = new PlatformsService();
        $result = $platformsService->getPlatformById(1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
