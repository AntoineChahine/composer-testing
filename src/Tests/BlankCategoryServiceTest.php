<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Blanks\BlankCategoryService;
use TeeLaunch\TeeLaunchConfig;

class BlankCategoryServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetBlankCategory(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $blankCategoryService = new BlankCategoryService();
        $result = $blankCategoryService->getBlankCategory();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

    }

    /**
     * @throws Exception
     */
    public function testGetBlankCategoryById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $blankCategoryService = new BlankCategoryService();
        $result = $blankCategoryService->getBlankCategoryById(1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetBlankByCategoryId(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $blankCategoryService = new BlankCategoryService();
        $result = $blankCategoryService->getBlankByCategoryId(1, 1, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
