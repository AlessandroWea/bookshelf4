<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\User;
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
        $user_model = new User();
        $this->render('admin/users.php', [
            'users' => $user_model->findAll(),
        ]);
    }

    public function actionSidebar()
    {
        return $this->fragment('fragments/admin/sidebar.php');
    }

    public function actionFooter()
    {
        $this->render('fragments/admin/footer.php');
    }

}