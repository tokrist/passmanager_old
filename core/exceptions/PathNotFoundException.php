<?php

namespace app\core\exceptions;

class PathNotFoundException extends \Exception {
    protected $message = 'Hoppá! Az oldal amit keres nem található!';
    protected $code = 404;
}