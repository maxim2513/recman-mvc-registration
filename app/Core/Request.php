<?php
declare(strict_types=1);

namespace App\Core;

class Request
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    private const BASE_FILE_PATH = 'index.php';

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath(): string
    {
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        $url = trim($url, '/');

        if (self::BASE_FILE_PATH === $url) {
            $url = $_GET['action'] ?? '';
        }

        return $url;
    }

}