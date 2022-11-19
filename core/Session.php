<?php

namespace app\core;

class Session {
    public function __construct() {
        session_start();
    }

    public function get($key) {
        return $_SESSION[$key] ?? false;
    }

    public function set($key, $value): void {
        $_SESSION[$key] = $value;
    }

    public function remove($key): void{
        unset($_SESSION[$key]);
    }
}