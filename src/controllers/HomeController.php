<?php

declare(strict_types=1);

namespace app\controllers;

use Malordo\Request\Request;
use Malordo\Base\BaseController;
use Malordo\Session\NativeSessionStorage;
use Malordo\Session\Session;

class HomeController extends BaseController
{
    private $request;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session(new NativeSessionStorage());
        $this->request = new Request();
    }

    public function actionIndex()
    {
        $name = $this->request->query('name');
        
        $this->render('home/index.php', [
            'name' => $name,
            'lastname' => $this->session->get('lastname', 'anonus'),
        ]);
    }
}