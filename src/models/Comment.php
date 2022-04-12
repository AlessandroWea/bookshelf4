<?php

namespace app\models;

use Malordo\Database\Database as Db;

class Comment
{
    public static function findAllCountByReviewId($id)
    {
        $query = Db::execute("SELECT COUNT(*) FROM comments JOIN users ON comments.id_user=users.id WHERE comments.id_review=:id", ['id'=>$id]);

        return $query->fetch()['COUNT(*)'];
    }

    public static function findByReviewId($id, $offset = 0, $limit = 0)
    {
        $query = Db::execute("SELECT comments.*, users.username FROM comments JOIN users ON comments.id_user = users.id WHERE comments.id_review = :id LIMIT $offset, $limit", ['id'=>$id]);

        return $query->fetchAll();
    }

    public static function findAllByReviewId($id)
    {
        $query = Db::execute("SELECT comments.*, users.username FROM comments JOIN users ON comments.id_user = users.id WHERE comments.id_review = :id", ['id'=>$id]);

        return $query->fetchAll();
    }

    public static function add($user_id, $review_id, $text)
    {
        $query = Db::execute("INSERT INTO comments SET id_user=:user_id, id_review=:review_id, text=:text", [
            'user_id' => $user_id,
            'review_id' => $review_id,
            'text' => $text,
        ]);

    }
}