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

    /*Facebook Connect */
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'), //compte facebook developper
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'), //compte facebook developper
        'redirect' => env('FACEBOOK_CALLBACK'),
    ],

    /*google Connect */
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'), //compte GOOGLE developper
        'client_secret' => env('GOOGLE_CLIENT_SECRET'), //compte GOOGLE developper
        'redirect' => env('GOOGLE_CALLBACK'),
    ],

];
