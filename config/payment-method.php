<?php

return [
    'enabled' => [
        'mercadopago',
    ],
    'use_sandbox' => env('SANDBOX_GATEWAYS', true),
    'mercadopago' => [
        'client' => env('MP_CLIENT'),
        'secret' => env('MP_SECRET'),
        'public-key' => env('MP_PUBLIC_KEY'),
        'access-token' => env('MP_ACCESS_TOKEN'),
    ]
];
