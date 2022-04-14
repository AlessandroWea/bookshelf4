<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Base\BaseController;

class ProfileController extends BaseController
{
    public function actionIndex($id)
    {
        return $this->render('profile/index.php');
    }
}