<?php
declare(strict_types=1);
const APP_PATH = __DIR__.'/../app';
return [
    "DB_HOST" => 'mysql',
    "DB_PORT" => '3306',
    "DB_USER" => getenv('MYSQL_USER'),
    "DB_PASSWORD" => getenv('MYSQL_PASSWORD'),
];