<?php
declare(strict_types=1);

namespace App\Core;

use App\Core\Response\AbstractResponse;
use PDO;

class Application
{
    private ?PDO $connection = null;

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

    public function getRepository(string $className): AbstractRepository
    {
        if (null === $this->connection) {
            $this->initPDOConnection();
        }

        $repositoryClassname = 'App\Models\Repositories\\'.$className.'Repository';

        return new $repositoryClassname($this->connection);
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

    protected function initPDOConnection(): void
    {
        $pdo = new PDO("mysql:host=".$this->config['DB_HOST'].";dbname=".$this->config['DB_NAME'].";charset=utf8",
            $this->config['DB_USER'],
            $this->config['DB_PASSWORD']
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection = $pdo;
    }
}
