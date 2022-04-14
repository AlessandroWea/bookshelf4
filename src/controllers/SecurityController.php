<?php

namespace app\controllers;

use Malordo\Base\BaseController;

use app\models\User;

use app\utils\Auth;

use app\validators\SignupValidator;

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
        $username = '';
        $email = '';
        $errors = [];

        if($this->request->isPost()){
            $username = $this->request->input('username');
            $email = $this->request->input('email');
            $password = $this->request->input('password');
            $repeat_password = $this->request->input('repeat_password');

            if(SignupValidator::validate([
                'username' => $username,
                'email' => $email,
                'password1' => $password,
                'password2' => $repeat_password,
            ])){
                $new_id = User::add($username, $email, $password);
                return $this->redirect('/');
            }
            else {
                $errors = SignupValidator::getErrors();
            }
        }


        $this->render('security/register.php', compact('username', 'email', 'errors'));
    }

    public function actionLogout()
    {
        Auth::logout();
        $this->redirect('/');
    }

}