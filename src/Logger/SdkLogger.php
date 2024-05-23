<?php

namespace TeeLaunch\Logger;

use Exception;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;

class SdkLogger extends MonologLogger
{
    public function __construct(string $channel)
    {
        parent::__construct($channel); // Call the parent constructor

        // To let it read from the logger config file
        $config = require __DIR__.'/../../config/logging.php';

        // Get the configuration for the specified channel
        $channelConfig = $config['channels'][$channel] ?? null;

        if ($channelConfig === null) {
            throw new \InvalidArgumentException("Channel '{$channel}' not found in the configuration.");
        }

        $logFilePath = $channelConfig['folder'];

        $this->pushHandler(new StreamHandler($logFilePath, $channelConfig['level']));
    }

    public function debug($message, array $context = []): void
    {
        try {
            parent::debug($message, $context); // Call the parent's debug method
        } catch (Exception $e) {
            // Handle the exception as needed, e.g., log it as critical
            Log::critical($e);
        }
    }

    public function info($message, array $context = []): void
    {
        try {
            parent::info($message, $context); // Call the parent's info method
        } catch (Exception $e) {
            // Handle the exception as needed, e.g., log it as critical
            Log::critical($e);
        }
    }

    public function error($message, array $context = []): void
    {
        try {
            parent::error($message, $context); // Call the parent's error method
        } catch (Exception $e) {
            // Handle the exception as needed, e.g., log it as critical
            Log::critical($e);
        }
    }
}
