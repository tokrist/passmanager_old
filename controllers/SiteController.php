<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\SiteMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Organization;

class SiteController extends Controller {
    public function __construct() {
        $this->registerMiddleware(new SiteMiddleware());
    }

    public function dashboard(): bool|array|string {
        return $this->render('dashboard');
    }

    public function newOrganization(Request $request, Response $response): bool|array|string|null {
        $organization = new Organization();

        if($request->isPost()) {
            $organization->loadData($request->getBody());

            if($organization->validate() && $organization->save()) {
                echo "<script>setTimeout(function(){Swal.fire({icon: 'success',title: 'Sikeresen létrehozott egy új szervezetet!', toast: true, position: 'top-end', showConfirmButton: false, timer: 3000}).then((result) =>{/*window.location = '/manage/organizations';*/})},100);</script>";
                return $this->render('newOrganization', ['model' => $organization]);
            }
        }

        return $this->render('newOrganization', ['model' => $organization]);
    }
}