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
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    'firebase' => [
        'api_key' => 'AIzaSyB2fbeB1-OKaNiS7hqqGnmygg0JsPNLWUg',
        'auth_domain' => 'appmongodb-2430b.firebaseapp.com',
        'database_url' => 'https://appmongodb-2430b-default-rtdb.asia-southeast1.firebasedatabase.app/',
        'project_id' => 'appmongodb-2430b',
        'storage_bucket' => 'appmongodb-2430b.appspot.com',
        'messaging_sender_id' => '726392088813',
        'app_id' => '1:726392088813:web:1a1fc2499b00305c40c4e4',
        'measurement_id' => 'G-DJWQ6XKG30',
    ],

];
