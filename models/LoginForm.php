<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model {
    public string $username = "";
    public string $password = "";

    public function rules(): array {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array {
        return [
            'username' => "Felhasználónév",
            'password' => "Jelszó"
        ];
    }

    public function login(): ?bool {
        $user = (new User)->findOne(['userUsername' => Application::$app->auth->encryptData($this->username)]);
        if(!$user) {
            $this->addError('username', 'Ezzel a felhasználónévvel nem létezik felhasználó az adatbázisban!');
            return false;
        }
        if(!password_verify($this->password, $user->userPassword)) {
            $this->addError('password', 'Helytelen jelszó!');
            return false;
        }
        if(!$user->userCanLogin) {
            echo "<script>setTimeout(function(){Swal.fire({icon: 'error',title: 'Hiba! Nincs joga belépni a rendszerbe!', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000})},100);</script>";
            return false;
        }
        return Application::$app->login($user);
    }
}