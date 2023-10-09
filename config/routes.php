<?php
return [
    '' => [
        'GET' => [
            /** @uses \App\Controllers\BaseController::index */
            'class' => \App\Controllers\BaseController::class,
            'method' => 'index',
        ],
    ],
    'register' => [
        'GET' => [
            'class' => \App\Controllers\BaseController::class,
            'method' => 'index',
        ],
    ],
];