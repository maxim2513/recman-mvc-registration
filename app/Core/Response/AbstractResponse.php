<?php
declare(strict_types=1);

namespace App\Core\Response;

abstract class AbstractResponse
{
    abstract public function send(): void;
}