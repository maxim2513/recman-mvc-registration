<?php
declare(strict_types=1);

namespace App\Core;

use PDO;

abstract class AbstractRepository
{
    public const TABLE_NAME = '';

    public function __construct(
        readonly protected PDO $connection,
    ) {
    }

}
