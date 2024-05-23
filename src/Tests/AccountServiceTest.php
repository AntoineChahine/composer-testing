<?php

namespace TeeLaunch\Tests;

use JsonException;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Accounts\AccountService;
use TeeLaunch\TeeLaunchConfig;

class AccountServiceTest extends TestCase
{
    /**
     * @throws JsonException
     */
    public function testGetAccount(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $accountService = new AccountService();
        $result = $accountService->getAccount();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertSame('hamze', $result['code']);

    }
}
