<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;

use app\models\Like;
use app\utils\Auth;

class LikeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        if(!Auth::logged())
            $this->redirect('/login');
    }

    public function actionLike()
    {
        if($this->request->isPost()){
            $review_id = $this->request->input('review_id');
            $user_id = Auth::getUserId();

            //check if user already liked
            $like = Like::find($user_id, $review_id);
            if(!$like){
                Like::add($user_id, $review_id);
            }

            return $this->redirect("/review/$review_id");
        }
    }

    public function actionUnlike()
    {
        if($this->request->isPost()){
            $review_id = $this->request->input('review_id');
            $user_id = Auth::getUserId();

            Like::delete($user_id, $review_id);

            return $this->redirect("/review/$review_id");
        }
    }
}