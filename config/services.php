<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1482373231841482',
        'client_secret' => 'c67c3dd411a184fce38a6e6e5ced0c09',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '70774404960-k5rrcfresks710ga23ab2m4n2apqtisd.apps.googleusercontent.com',
        'client_secret' => 'iDaHgGDq1MywaTsmjTRiD82T',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'github' => [
        'client_id' => 'afc0f34b415b8d8af8bf',
        'client_secret' => '7d9fff48fde328a2e6804c0eb78bc893d65177c2',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],
];
