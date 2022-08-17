<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '785500433381-mqa704i9fcie0dg58e5u5dnm8vv507hj.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:1233/auth/google/callback',
    ],


    'github' => [
        'client_id' => 'a4eee281e1bbc2b58912',
        'client_secret' => '66993cb43106afcda4051cb452f5258fd8ff238a',
        'redirect' => 'http://localhost:1233/auth/github/callback'
    ]

];
