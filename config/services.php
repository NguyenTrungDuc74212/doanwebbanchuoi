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
        'client_id' => '676157698134-62qbrffn4jlhp7q41jhcpfljhhtr3pnv.apps.googleusercontent.com',
        'client_secret' => 'BR2epH-V-6GFQ_A3bxUzld3C',
        'redirect' => 'http://myweb.local.com/banchuoi/callback'
    ],
    'facebook' => [
        'client_id' => '511180879841868',  //client face của bạn
        'client_secret' => '6df4c7f4aee415589e08aa12e85b2ade',  //client app service face của bạn
        'redirect' => 'http://myweb.local.com/banchuoi/facebook/callback' //callback trả về
    ],

];
