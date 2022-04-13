<?php

declare(strict_types=1);

namespace app\models;

use Malordo\Database\Database as Db;

class User
{
    public static function findAll($limit = false)
    {
        $query = Db::execute("SELECT * FROM users");
        return $query->fetchAll();
    }

    public static function findByEmail(string $email)
    {
        $query = Db::execute("SELECT * FROM users WHERE email=:email", compact('email'));
        return $query->fetch();
    }

    public static function add($username, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $online = 0;
        $role = 'user';
        return Db::insert('users', compact('username', 'email', 'password', 'online', 'role'));
    }

    public static function findAllCount()
    {
        $query = Db::execute("SELECT COUNT(*) FROM users");
        return $query->fetch()['COUNT(*)'];
    }
}