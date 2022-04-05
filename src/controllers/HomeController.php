<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Request\Request;
use Malordo\Base\BaseController;

class HomeController extends BaseController
{
    private $request;

    public function __construct()
    {
        parent::__construct();
        
        $this->request = new Request();
    }

    public function actionIndex()
    {
        $name = $this->request->query('name');
        $this->render('home/index.php', [
            'name' => $name,
        ]);
    }
}