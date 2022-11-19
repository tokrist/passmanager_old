<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\SiteMiddleware;

class SiteController extends Controller {
    public function __construct() {
        $this->registerMiddleware(new SiteMiddleware());
    }

    public function dashboard(): bool|array|string {
        return $this->render('dashboard');
    }

    public function newOrganization() {

    }
}