<?php

namespace app\controllers;

use Malordo\Base\BaseController;
use app\validators\UserValidator;
use app\models\User;
use app\utils\Auth;

class SecurityController extends BaseController
{
    public function actionLogin()
    {
        $error = '';
        $email = '';

        if($this->request->isPost())
        {
            $email = $this->request->input('email');
            $password = $this->request->input('password');

            $user = User::findByEmail($email);
            if($user){
                if(password_verify($password, $user['password'])){
                    Auth::auth($user);
                    $this->redirect('/');
                }
            }

            $error = 'Login or password is incorrect';
        }

        return $this->render('security/login.php', [
            'error' => $error,
            'email' => $email,
        ]);
    }

    public function actionSignup()
    {
        
            // $errors = UserValidator::validate([
            //     'email' => $email,
            //     'password' => $password,
            // ]);

            // if(!empty($errors)){
            //     return $this->render('security/login.php', [
            //         'errors' => $errors,
            //         'email' => $email,
            //         'password' => $password,
            //     ]);
            // }
        $this->render('security/register.php', [
            
        ]);
    }

    public function actionLogout()
    {
        //logout

        //redirect to homepage


    }

}