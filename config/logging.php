<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */
    'channels' => [

        'default' => [
            'driver' => 'custom',
            'folder' => '../logs/sdk.log',
            'via' => \TeeLaunch\Logger\SdkLogger::class,
            'level' => 'debug',

        ],
    ],

];
