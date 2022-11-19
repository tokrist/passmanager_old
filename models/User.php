<?php

namespace app\models;

use app\core\Application;
use app\core\database\DBModel;

class User extends DBModel {
    public int $userId = 0;
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
        return ['userUsername', 'userPassword', 'userFullname', 'userEmail', 'userRegisterTime', 'userRoleId', 'userPicturePath', 'userCanLogin'];
    }

    public function rules(): array {
        return [
            'userUsername' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'userFullname' => [self::RULE_REQUIRED],
            'userEmail' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class], 'attribute'],
            'userPassword' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'userPassword']],
        ];
    }

    public function labels(): array {
        return [
            'userUsername' => "Felhasználónév",
            'userPassword' => "Jelszó",
            'userFullname' => "Teljes név",
            'userEmail' => "Email cím",
            'confirmPassword' => "Jelszó megerősítése",
        ];
    }

    public function save(): bool {
        $this->userUsername = Application::$app->auth->encryptData($this->userUsername);
        $this->userPassword = Application::$app->auth->passwordHash($this->userPassword);
        $this->userFullname = Application::$app->auth->encryptData($this->userFullname);
        $this->userEmail = Application::$app->auth->encryptData($this->userEmail);
        $this->userRoleId = 2;
        $this->userCanLogin = true;

        return parent::save();
    }

    /** Getters */
    public function getUserUsername(): string {
        return Application::$app->auth->decryptData($this->userUsername);
    }

    public function getUserFullname(): string {
        return Application::$app->auth->decryptData($this->userFullname);
    }

    public function getUserEmail(): string {
        return Application::$app->auth->decryptData($this->userEmail);
    }

    public function getUserRegisterTime(): string {
        return $this->userRegisterTime;
    }

    public function getUserPicturePath(): string {
        return $this->userPicturePath;
    }

    public function isUserCanLogin(): bool {
        return $this->userCanLogin;
    }

    public function getUserRole(): array {
        $result = self::query('ROLES', 'roleId', $this->userRoleId);
        $values = [];
        foreach ($result as $row => $itemValue) {
            $values[$row] = $itemValue;
        }
        return $values[0];
    }
}