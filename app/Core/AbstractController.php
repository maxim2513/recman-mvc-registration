<?php
declare(strict_types=1);

namespace App\Core;

abstract class AbstractController
{
    public function __construct(
        readonly protected Application $app
    ) {
    }
}
