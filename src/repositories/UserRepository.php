<?php

declare(strict_types=1);

namespace app\repositories;

use Malordo\Database\Database;

class UserRepository extends Database
{
    public function findAll()
    {
        $query = $this->execute("SELECT * FROM users");
        return $query->fetchAll();
    }
}