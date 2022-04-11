<?php

declare(strict_types=1);

namespace app\models;

use Malordo\Database\Database;

class User extends Database
{
    public function findAll($limit = false)
    {
        $query = $this->execute("SELECT * FROM users");
        return $query->fetchAll();
    }

    public function findByEmail(string $email)
    {
        $query = $this->execute("SELECT * FROM users WHERE email=:email", compact('email'));
        return $query->fetch();
    }
}