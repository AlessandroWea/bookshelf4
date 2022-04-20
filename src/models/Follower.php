<?php

namespace app\models;

use Malordo\Database\Database as Db;

class Follower
{
    public static function follow($user_id, $followed_id)
    {
        Db::insert('followers', [
            'id_user' => $user_id,
            'id_followed' => $followed_id,
        ]);
    }

    public static function unfollow($user_id, $followed_id)
    {
        Db::execute("DELETE FROM followers WHERE id_user=:id_user AND id_followed=:id_followed",[
            'id_user' => $user_id,
            'id_followed' => $followed_id,
        ]);
    }

    public static function followers($id, $offset, $limit)
    {
        $query = Db::execute("SELECT followers.id_user as id, users.username FROM followers JOIN users ON followers.id_user = users.id WHERE followers.id_followed=:id LIMIT $offset,$limit", ['id'=>$id]);
        return $query->fetchAll();
    }

    public static function followersCount($id)
    {
        $query = Db::execute("SELECT COUNT(*) FROM followers WHERE id_followed=:id", ['id'=>$id]);
        return $query->fetch()['COUNT(*)'];
    }

    public static function followings($id, $offset, $limit)
    {
        $query = Db::execute("SELECT followers.id_followed as id, users.username FROM followers JOIN users ON followers.id_followed = users.id WHERE followers.id_user=:id LIMIT $offset,$limit", ['id'=>$id]);
        return $query->fetchAll();
    }

    public static function followingsCount($id)
    {
        $query = Db::execute("SELECT COUNT(*) FROM followers WHERE id_user=:id", ['id'=>$id]);
        return $query->fetch()['COUNT(*)'];
    }

    public static function isFollowedBy($id_followed, $id_user)
    {
        $query = Db::execute("SELECT * FROM followers WHERE id_followed=:id_followed AND id_user=:id_user", compact('id_followed', 'id_user'));
        
        return $query->fetch() ? true : false;
    }
}