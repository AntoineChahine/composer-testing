<?php

namespace TeeLaunch;

class TeeLaunchConfig
{
    private static $baseUri = 'http://127.0.0.1:8001/api/v1';

    private static $bearerToken;

    public static function getBaseUri()
    {
        return self::$baseUri;
    }

    public static function setBearerToken($token)
    {
        self::$bearerToken = $token;
    }

    public static function getBearerToken()
    {
        return self::$bearerToken;
    }
}
