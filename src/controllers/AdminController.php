<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;

use app\models\User;
use app\models\Review;

use app\utils\Auth;

class AdminController extends BaseController
{
    const ELEMENTS_PER_PAGE = 3;
    const NUMBER_OF_PAGE_LINKS = 3;

    public function __construct()
    {
        parent::__construct();
        $this->changeLayout('admin.php');
        // dd($this->view->layout);
    }

    public function actionIndex()
    {
        $this->render('admin/index.php', [
            
        ]);
    }

    public function actionUsers()
    {
        $this->render('admin/users.php', [
            'users' => User::findAll(),
        ]);
    }

    public function actionViewUser($id)
    {
        $this->redirect("/profile/$id");
    }

    public function actionDeleteUser($id)
    {
        User::delete($id);

        $this->redirect('/admin/users');
    }

    public function actionViewReview($id)
    {
        $this->redirect("/review/$id");
    }

    public function actionDeleteReview($id)
    {
        Review::delete($id);

        $this->redirect('/admin/reviews');
    }

    public function actionReviews()
    {
        $page = $this->request->query('page') ?? 1;
        $offset = self::ELEMENTS_PER_PAGE * ($page - 1);
        $total_reviews = Review::findAllCount();
        $total_pages = ceil($total_reviews / self::ELEMENTS_PER_PAGE);

        $this->render('admin/reviews.php', [
            'reviews' => Review::findAllFromRange($offset, self::ELEMENTS_PER_PAGE),
            'total_pages' => $total_pages,
            'elements_per_page' => self::ELEMENTS_PER_PAGE,
            'number_of_page_links' => self::NUMBER_OF_PAGE_LINKS,
            'page' => $page,
        ]);
    }

    public function actionSidebar()
    {
        $users_count = User::findAllCount();
        $reviews_count = Review::findAllCount();

        return $this->fragment('fragments/admin/sidebar.php', compact(
            'users_count', 'reviews_count'
        ));
    }

}