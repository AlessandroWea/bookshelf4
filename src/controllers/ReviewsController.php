<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Review;
use Malordo\Base\BaseController;
use app\models\Comment;
use app\models\Like;
use app\validators\ReviewValidator;
use app\utils\Auth;

class ReviewsController extends BaseController
{
    public function actionView(int $id)
    {
        if(($review = Review::find($id)) === false)
            die('404 not found');

        $this->render('home/view.php', [
            'review' => $review,
            'comments_count' => Comment::findAllCountByReviewId($id),
            'comments' => Comment::findAllByReviewId($id),
            'likes_count' => Like::findAllCountByReviewId($id),
        ]);
    }

    public function actionWrite()
    {
        if(!Auth::logged())
            $this->redirect('login');

        $bookname = '';
        $authorname = '';
        $theme = '';
        $text = '';
        $errors = [];

        if($this->request->isPost()){
            $bookname = $this->request->input('bookname');
            $authorname = $this->request->input('authorname');
            $theme = $this->request->input('theme');
            $text = $this->request->input('text');
            $errors = ReviewValidator::validate(compact('bookname','authorname','theme','text'));
            if(empty($errors)){
                $new_id = Review::add(Auth::getUserId(), $bookname, $authorname, $theme, $text);
                return $this->redirect("/review/$new_id");
            }

        }


        return $this->render('reviews/write.php', compact('bookname', 'authorname', 'theme', 'text', 'errors'));
    }
}