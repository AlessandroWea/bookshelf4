<?php

declare(strict_types=1);

namespace app\controllers;

use app\repositories\UserRepository;
use app\validators\UserValidator;

use Malordo\Base\BaseController;

use app\utils\Auth;

class AdminController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->view->layout = 'admin.php';
        // dd($this->view->layout);
        // if(!Auth::is('admin'))
        //     die('Access denied!');
    }

    public function actionIndex()
    {


        $this->render('admin/index.php', [
            
        ]);
    }

    public function actionUsers()
    {
        $user_repository = new UserRepository();
        $this->render('admin/users.php', [
            'users' => $user_repository->findAll(),
        ]);
    }

    public function actionFooter()
    {
        $this->render('fragments/admin/footer.php');
    }

}