<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;

use app\utils\Auth;
use app\models\User;
use app\models\Review;
use app\models\Follower;

class ProfileController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        if(!Auth::logged())
            $this->redirect('/login');
    }
    public function actionIndex($id)
    {
        $user = User::findById($id);
        if(!$user)
            die('404 NOT FOUND');

        return $this->render('profile/index.php', [
            'user' => $user,
            'reviews_count' => Review::findAllCountByUserId($id),
            'followers_count' => Follower::followersCount($id),
            'followings_count' => Follower::followingsCount($id),
            'is_followed' => Follower::isFollowedBy($id, Auth::getUserId()),
        ]);
    }

    public function actionFollow($id)
    {
        $user = User::findById($id);
        if(!$user)
            die('404 NOT FOUND');

        //check if already follows
        $is_followed = Follower::isFollowedBy($id, Auth::getUserId());
        if(!$is_followed){
            Follower::follow(Auth::getUserId(), $id);
        }

        $this->redirect("/profile/$id");
    }

    public function actionUnfollow($id)
    {
        $user = User::findById($id);
        if(!$user)
            die('404 NOT FOUND');

        $is_followed = Follower::isFollowedBy($id, Auth::getUserId());
        if($is_followed){
            Follower::unfollow(Auth::getUserId(), $id);
        }

        $this->redirect("/profile/$id");
    }

}