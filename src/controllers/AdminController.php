<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\User;
use app\models\Review;
use app\validators\UserValidator;

use Malordo\Base\BaseController;

use app\utils\Auth;

class AdminController extends BaseController
{

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

    public function actionReviews()
    {
        $this->render('admin/reviews.php', [
            'reviews' => Review::findAll(),
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