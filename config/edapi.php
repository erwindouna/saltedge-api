<?php

return [
    'saltedge' => [
        'server' => env('ED_SALTEDGE'),
        'api' => [
            'version' => env('ED_SALTEDGE_APIVERSION'),
            'app_id' => env('ED_SALTEDGE_APPID'),
            'secret' => env('ED_SALTEDGE_SECRET')
        ]
    ]
];