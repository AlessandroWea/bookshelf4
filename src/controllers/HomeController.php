<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Review;
use Malordo\Base\BaseController;
use app\models\Comment;
use app\models\Like;

use app\utils\Auth;

class HomeController extends BaseController
{
    const REVIEWS_PER_PAGE = 5;

    public function actionIndex()
    {
        $page = $this->request->query('page') ?? 1;

        $total_count_of_reviews = Review::findAllCount();
        $last_page = ceil($total_count_of_reviews/self::REVIEWS_PER_PAGE);
        $offset = ($page-1) * self::REVIEWS_PER_PAGE;

        $reviews = Review::findAllFromRange($offset, self::REVIEWS_PER_PAGE);

        $this->render('home/index.php', compact('reviews', 'page', 'last_page', 'total_count_of_reviews'));
    }
}