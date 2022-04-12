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
}