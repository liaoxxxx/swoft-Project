<?php
return [
    'name'  => 'Swoft framework 2.0',
    'debug' => env('SWOFT_DEBUG', 1),
    'serverDispatcher' => [
        'middlewares' => [
            \Swoft\Http\Session\SessionMiddleware::class,
        ]
    ],
    'sessionManager' => [
        'class' => \Swoft\Http\Session\SessionManager::class,
        'config' => [
            'driver' => 'redis',
            'name' => 'SWOFT_SESSION_ID',
            'lifetime' => 1800,
            'expire_on_close' => false,
            'encrypt' => false,
            'storage' => '@runtime/sessions',
        ],
    ],

];
