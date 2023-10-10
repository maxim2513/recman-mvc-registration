<?php

namespace App\Core\Response;

use App\Core\Response\AbstractResponse;

class RedirectResponse extends AbstractResponse
{
    public function __construct(
        readonly protected string $route,
        readonly protected int $responseCode = 302
    ) {
    }

    public function send(): void
    {
        header("Location: ".$this->route, true, $this->responseCode);
    }
}
