<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;

use app\utils\Auth;
use app\models\User;
use app\models\Review;

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

        $reviews_count = Review::findAllCountByUserId($id);

        return $this->render('profile/index.php', compact(
            'user', 'reviews_count',
        ));
    }

}