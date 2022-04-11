<?php

declare(strict_types=1);

namespace app\models;

use Malordo\Database\Database;

class Review extends Database
{
    public function findAllFromRange($offset = false, $limit = false)
    {
        $query = $this->execute("SELECT users.username, reviews.* FROM reviews JOIN users ON users.id=reviews.user_id LIMIT $offset, $limit");

        return $query->fetchAll();
    }

    public function find($id)
    {
        $query = $this->execute("SELECT reviews.*, users.username FROM reviews JOIN users ON reviews.user_id = users.id WHERE reviews.id=:id", [
            'id'=>$id
        ]);
        return $query->fetch();
    }

    public function findAllCount()
    {
        $query = $this->execute("SELECT COUNT(*) FROM reviews");
        return $query->fetch()['COUNT(*)'];
    }
}