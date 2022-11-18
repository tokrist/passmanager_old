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
                $response->redirect('/home/dashboard');
                return NULL;
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
                Application::$app->login($user);
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