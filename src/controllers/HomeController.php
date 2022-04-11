<?php

declare(strict_types=1);

namespace app\controllers;

use app\repositories\UserRepository;
use app\validators\UserValidator;
use app\models\Review;
use Malordo\Base\BaseController;

use app\utils\Auth;

class HomeController extends BaseController
{
    const REVIEWS_PER_PAGE = 5;

    public function actionIndex()
    {
        $review_model = new Review();
        $page = $this->request->query('page') ?? 1;
        $total_count_of_reviews = $review_model->findAllCount();
        $last_page = ceil($total_count_of_reviews/self::REVIEWS_PER_PAGE);
        $offset = ($page-1) * self::REVIEWS_PER_PAGE;
        $reviews = $review_model->findAllFromRange($offset, self::REVIEWS_PER_PAGE);

        $this->render('home/index.php', compact('reviews', 'page', 'last_page', 'total_count_of_reviews'));
    }

    // public function actionGetReviews()
    // {
    //     $review_model = new Review();
  
    //     header('Content-Type: application/json');
    //     $obj = $this->request->getData();

    //     exit(json_encode([
    //         'content' => $review_model->findAll($obj->count),
    //     ]));  
    // }

    public function actionView(int $id)
    {
        $review_model = new Review();

        if(($review = $review_model->find($id)) === false)
            die('404 not found');

        $this->render('home/view.php', [
            'review' => $review,
        ]);
    }
}