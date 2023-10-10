<?php
return [
    '' => [
        'GET' => [
            /** @uses \App\Controllers\BaseController::index */
            'class' => \App\Controllers\BaseController::class,
            'method' => 'index',
        ],
    ],
    'registration' => [
        'GET' => [
            /** @uses \App\Controllers\RegistrationController::index */
            'class' => \App\Controllers\RegistrationController::class,
            'method' => 'index',
        ],
        'POST' => [
            /** @uses \App\Controllers\RegistrationController::saveRegistration */
            'class' => \App\Controllers\RegistrationController::class,
            'method' => 'saveRegistration',
        ],
    ],
    'login' => [
        'GET' => [
            /** @uses \App\Controllers\LoginController:index */
            'class' => \App\Controllers\LoginController::class,
            'method' => 'index',
        ],
        'POST' => [
            /** @uses \App\Controllers\LoginController::login */
            'class' => \App\Controllers\LoginController::class,
            'method' => 'login',
        ],
    ],
    'logout' => [
        'POST' => [
            /** @uses \App\Controllers\LoginController::logout */
            'class' => \App\Controllers\LoginController::class,
            'method' => 'logout',
        ],
    ],

];