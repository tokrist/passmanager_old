<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller {

    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['dashboard']));
    }

    public function login(Request $request, Response $response): bool|array|string|null {
        if(Application::$app->session->get('userId') !== false) {
            $response->redirect('/home/dashboard');
        }

        $loginForm = new LoginForm();

        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                echo "<script>setTimeout(function(){Swal.fire({icon: 'success',title: 'Sikeres bejelentkezés!', toast: true, position: 'top-end', showConfirmButton: false, timer: 3000}).then((result) =>{window.location = '/home/dashboard';})},100);</script>";
                $this->setLayout('auth');
                return $this->render('login', ['model' => $loginForm]);
            }
        }

        $this->setLayout('auth');
        return $this->render('login', ['model' => $loginForm]);
    }

    public function register(Request  $request) {
        $user = new User();

        if($request->isPost()) {
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()) {
                Application::$app->login((new User)->findOne(['userUsername' => $user->userUsername]));
                Application::$app->response->redirect('/');
                exit;
            }
            $this->setLayout('auth');
            return $this->render('register', ['model' => $user]);
        }

        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response): void {
        Application::$app->logout();
        $response->redirect('/');
    }
}