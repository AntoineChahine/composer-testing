<?php

namespace TeeLaunch\Tests;

use JsonException;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Accounts\AccountPaymentService;
use TeeLaunch\TeeLaunchConfig;

class AccountPaymentServiceTest extends TestCase
{
    /**
     * @throws JsonException
     */
    public function testGetAccountPayments(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $accountPaymentService = new AccountPaymentService();
        $result = $accountPaymentService->getAccountPayments(5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws JsonException
     */
    public function testGetAccountPaymentById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $accountPaymentService = new AccountPaymentService();
        $result = $accountPaymentService->getAccountPaymentById(100000000752);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
