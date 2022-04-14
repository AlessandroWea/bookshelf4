<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;
use app\models\Comment;
use app\utils\Auth;

class CommentController extends BaseController
{
    public function actionComment()
    {
        if($this->request->isPost())
        {
            $review_id = $this->request->input('id');
            $text = $this->request->input('text');
            
            $user = Auth::getUser();

            if(strlen($text) > 0)
                Comment::add($user['id'], $review_id, $text);

            $this->redirect("/review/$review_id");
        }

        die;
    }
}