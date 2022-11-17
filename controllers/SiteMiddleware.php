<?php

namespace app\controllers;

use app\core\Application;
use app\core\exceptions\ForbiddenException;
use app\core\middlewares\BaseMiddleware;

class SiteMiddleware extends BaseMiddleware {
    public array $actions = [];

    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }

    /**
     * @throws ForbiddenException
     */
    public function execute() {
        if(Application::isGuest()) {
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}