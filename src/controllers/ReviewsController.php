<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;

use app\models\Review;
use app\models\Comment;
use app\models\Like;

use app\validators\AddingReviewValidator;

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
            'is_liked' => Like::find(Auth::getUserId(), $id) ? true : false,
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

            if(AddingReviewValidator::validate(compact('bookname','authorname','theme','text'))){
                $new_id = Review::add(Auth::getUserId(), $bookname, $authorname, $theme, $text);
                return $this->redirect("/review/$new_id");
            }
            else{
                $errors = AddingReviewValidator::getErrors();
            }

        }

        return $this->render('reviews/write.php', compact(
            'bookname',
            'authorname',
            'theme',
            'text',
            'errors'
        ));
    }

    public function actionGetReviews()
    {
        $data = $this->request->getData();

        $user_id = $data->user_id;
        $count = $data->count;
        $reviews = Review::findAllFromRangeByUserId($user_id,$count,2);

        exit(json_encode([
            'count' => $count+2,
            'reviews' => $reviews,
        ]));
    }
}