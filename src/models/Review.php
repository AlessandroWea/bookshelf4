<?php

declare(strict_types=1);

namespace app\models;

use Malordo\Database\Database;

class Review
{
    public static function findAllFromRange($offset = false, $limit = false)
    {
        $query = Database::execute("SELECT users.username, reviews.* FROM reviews JOIN users ON users.id=reviews.user_id LIMIT $offset, $limit");
        return $query->fetchAll();
    }

    public static function findAll()
    {
        $query = Database::execute("SELECT users.username, reviews.* FROM reviews JOIN users ON users.id=reviews.user_id");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Database::execute("SELECT reviews.*, users.username FROM reviews JOIN users ON reviews.user_id = users.id WHERE reviews.id=:id", [
            'id'=>$id
        ]);
        return $query->fetch();
    }

    public static function findAllCount()
    {
        $query = Database::execute("SELECT COUNT(*) FROM reviews");
        return $query->fetch()['COUNT(*)'];
    }

    public static function add($user_id, $bookname, $authorname, $theme, $text)
    {
        return Database::insert('reviews', compact('user_id', 'bookname', 'authorname', 'theme', 'text'));
    }
}