<?php
declare(strict_types=1);
const APP_PATH = __DIR__.'/../app';
return [
    "DB_HOST" => getenv('MYSQL_HOST'),
    "DB_NAME" => getenv('MYSQL_DATABASE'),
    "DB_USER" => getenv('MYSQL_USER'),
    "DB_PASSWORD" => getenv('MYSQL_PASSWORD'),
];