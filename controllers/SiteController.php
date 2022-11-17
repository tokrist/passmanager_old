<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller {
    public function __construct() {
        $this->registerMiddleware(new SiteMiddleware(['dashboard']));
    }

    public function index(): void {
        Application::$app->response->redirect('/auth/login');
    }

    public function dashboard(): bool|array|string {
        return $this->render('dashboard');
    }
}