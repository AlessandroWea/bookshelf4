<?php

namespace app\models;

use Malordo\Database\Database as Db;

class Like
{
    public static function findAllCountByReviewId($id)
    {
        $query = Db::execute("SELECT COUNT(*) FROM likes_reviews WHERE likes_reviews.id_review=:id", ['id'=>$id]);

        return $query->fetch()['COUNT(*)'];
    }

    public static function find($user_id, $review_id)
    {
        $query = Db::execute("SELECT * FROM likes_reviews WHERE id_user=:user_id AND id_review=:review_id", compact(
            'user_id', 'review_id',
        ));

        return $query->fetch();
    }

    public static function add($id_user, $id_review)
    {
        return Db::insert('likes_reviews', compact('id_user', 'id_review'));
    }

    public static function delete($id_user, $id_review)
    {
        return Db::execute("DELETE FROM likes_reviews WHERE id_review=:id_review AND id_user=:id_user", compact(
            'id_user', 'id_review',
        ));
    }
}