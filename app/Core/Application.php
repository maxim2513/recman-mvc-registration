<?php
declare(strict_types=1);

namespace App\Core;

use App\Core\Response\AbstractResponse;

class Application
{
    public function __construct(
        readonly protected array $config = []
    ) {
    }

    public function handleRequest(): AbstractResponse
    {
        $request = new Request();

        $action = $this->getAction($request);

        $controller = new $action['class']($this);

        $response = call_user_func([$controller, $action['method']], $request);

        return $response;
    }

    protected function getAction(Request $request): array
    {
        $routes = $this->config['routes'];
        if (!isset($routes[$request->getPath()])) {
            return $routes[''][Request::METHOD_GET];
        }

        $path = $routes[$request->getPath()];

        return $path[$request->getMethod()] ?? $routes[''][Request::METHOD_GET];
    }
}
