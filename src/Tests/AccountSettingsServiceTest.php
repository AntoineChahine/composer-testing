<?php

namespace TeeLaunch\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TeeLaunch\Services\Accounts\AccountSettings;
use TeeLaunch\TeeLaunchConfig;

class AccountSettingsServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetAccountSettings(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $accountSettingsService = new AccountSettings();
        $result = $accountSettingsService->getAccountSettings('order', 5, 1);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

    }

    /**
     * @throws Exception
     */
    public function testGetAccountPaymentById(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $accountSettingsService = new AccountSettings();
        $result = $accountSettingsService->getAccountSettingsById(134);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @throws Exception
     */
    public function testUpdateAccountPayment(): void
    {
        TeeLaunchConfig::setBearerToken('GkSJw1qTSlxWzVmZfe4qtAG0oMRT4GOpLUiINWd5exhxT4QzQqK5iCToZQFI');
        $accountSettingsService = new AccountSettings();

        $payload = [
            'key' => 'order_hold',
            'value' => '3',
        ];

        $result = $accountSettingsService->updateAccountSettingsById(3, $payload);

        $this->assertNotFalse($result);
        $this->assertNotEmpty($result);
    }
}
