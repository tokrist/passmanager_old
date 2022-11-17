<?php

namespace app\models;

use app\core\Application;
use app\core\database\DBModel;

class User extends DBModel {
    public string $userUsername = '';
    public string $userPassword = '';
    public string $userFullname = '';
    public string $userEmail = '';
    public string $userRegisterTime = '';
    public ?int $userRoleId = NULL;
    public string $userPicturePath = '';
    public bool $userCanLogin = false;
    public string $confirmPassword = '';

    public static function tableName(): string {
        return 'USERS';
    }

    public function attributes(): array {
        return ['username', 'email', 'password'];
    }

    public function labels(): array {
        return [
            'username' => "Username",
            'email' => "Email address",
            'password' => "Password",
            'confirmPassword' => "Password confirmation",
        ];
    }

    public function save(): bool {
        $this->userEmail = Application::$app->auth->encryptData($this->userEmail);
        $this->userUsername = Application::$app->auth->encryptData($this->userUsername);
        $this->userPassword = Application::$app->auth->passwordHash($this->userPassword);
        return parent::save();
    }

    public function rules(): array {
        return [
            'username' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class], 'attribute'],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}