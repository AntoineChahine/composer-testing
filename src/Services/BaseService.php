<?php

namespace TeeLaunch\Services;

use TeeLaunch\Logger\SdkLogger;
use TeeLaunch\RequestBuilder;
use TeeLaunch\TeelaunchConfig;

class BaseService
{
    protected string $baseUri;

    protected string $bearerToken;

    protected SdkLogger $logger;

    protected RequestBuilder $requestBuilder;

    public function __construct()
    {
        $this->baseUri = TeeLaunchConfig::getBaseUri();
        $this->bearerToken = TeeLaunchConfig::getBearerToken();
        $this->logger = new SdkLogger('default');

        $this->requestBuilder = RequestBuilder::create()->log($this->logger);
    }
}
