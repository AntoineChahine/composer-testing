<?php

namespace TeeLaunch\Tests;

use Exception;
use JsonException;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Blanks\BlankService;
use TeeLaunch\TeeLaunchConfig;

class BlankServiceTest extends TestCase
{
    /**
     * @throws JsonException
     */
    public function testGetBlanks(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $blankService = new BlankService();
        $result = $blankService->getBlanks(5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testGetBlankById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $blankService = new BlankService();
        $result = $blankService->getBlankById(1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testCreateBlankById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $blankService = new BlankService();

        $payload = [
            'name' => 'Correct Size2800x3200',
            'description' => 'Product Description',
            'variants' => [
                539,
            ],
            'images' => [
                [
                    'url' => 'https://teelaunch-2.s3.us-west-2.amazonaws.com/accounts/100000046535/products/100000974028/art-files/1234756/01Design.png',
                    'position' => 'Front Shirt',
                    'location' => 'Full Print',
                    'offset' => 'Normal',
                ],
            ],
        ];

        $result = $blankService->createProductByBlankId(82, $payload);

        $this->assertNotEmpty($result);
    }
}
