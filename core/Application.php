<?php

namespace app\core;

use app\core\database\Database;
use app\core\database\DBModel;
use app\models\User;

class Application {
    public string $userClass;
    public string $layout = 'main';

    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = NULL;
    public Session $session;
    public Auth $auth;
    public Database $db;
    public ?USer $user;
    public View $view;

    public static Application $app;
    public static string $ROOT_DIR;

    public function __construct($rootPath, array $config) {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->session = new Session();
        $this->auth = new Auth($config['hashKey']);
        $this->view = new View();
        $this->userClass = $config['userClass'];
        $this->db = new Database($config['database']);

        $primaryValue = $this->session->get('userId');
        if($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = NULL;
        }
    }

    public function run(): void {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            var_dump($e);
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderViewOnly('_error', ['exception' => $e]);
        }
    }

    public function getController(): Controller {
        return $this->controller;
    }

    public function setController(Controller $controller): void {
        $this->controller = $controller;
    }

    public function login(User $user): bool {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('userId', $primaryValue);
        $this->session->set('timestamp', time());
        return true;
    }

    public function logout(): void {
        $this->user = null;
        $this->session->remove('userId');
        $this->session->remove('timestamp');
    }

    public static function isGuest(): bool {
        return !self::$app->user;
    }
}