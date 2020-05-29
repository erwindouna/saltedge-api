<?php

return [
    'saltedge' => [
        'server' => env('ED_SALTEDGE'),
        'api' => [
            'version' => env('ED_SALTEDGE_APIVERSION'),
            'app_id' => env('ED_SALTEDGE_APPID'),
            'secret' => env('ED_SALTEDGE_SECRET')
        ]
    ],
    'firefly' => [
        'server' => env('ED_FIREFLY'),
        'api' => [
            'version' => env('ED_FIREFLY_APIVERSION'),
            'secret' => env('ED_FIREFLY_SECRET'),
            'client' => env('ED_FIREFLY_CLIENT'),
            'access_token' => env('ED_FIREFLY_ACCESS_TOKEN'),
            'refresh_token' => env('ED_FIREFLY_REFRESH_TOKEN')
        ]
    ]
];