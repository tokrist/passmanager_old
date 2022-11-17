<?php

namespace app\core\exceptions;

class ForbiddenException extends \Exception {
    protected $message = 'Nincs joga megtekinteni az alábbi oldalt!';
    protected $code = 403;
}