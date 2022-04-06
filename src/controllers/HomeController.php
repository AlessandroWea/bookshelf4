<?php

declare(strict_types=1);

namespace app\controllers;

use app\repositories\UserRepository;
use app\validators\UserValidator;

use Malordo\Request\Request;
use Malordo\Base\BaseController;
use Malordo\Session\NativeSessionStorage;
use Malordo\Session\Session;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->session = new Session(new NativeSessionStorage());
        $this->request = new Request();
    }

    public function actionIndex()
    {
        $name = $this->request->query('name');

        // $data = [
        //     'name' => 'ale',
        //     'age' => '11',
        // ];

        // if(UserValidator::validate($data))
        //     echo 'success validation';
        // else {
        //     echo 'Name error: ' . (UserValidator::getErrors()['name'] ?? 'No errors') . '<br>';
        //     echo 'Age error: ' . (UserValidator::getErrors()['age'] ?? 'No errors') . '<br>';
        // }
        $user_repository = new UserRepository();

        $this->render('home/index.php', [
            'name' => $name,
            'lastname' => $this->session->get('lastname', 'anonus'),
            'users' => $user_repository->findAll(),
        ]);
    }
}