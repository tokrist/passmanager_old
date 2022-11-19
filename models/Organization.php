<?php

namespace app\models;

use app\core\database\DBModel;

class Organization extends DBModel {
    public ?int $orgId = NULL;
    public string $orgName = '';
    public ?int $orgOwnerId = NULL;
    public string $orgRegisterTime = ''; //0000-00-00 00:00:00


    public static function tableName(): string {
        return 'ORGANIZATIONS';
    }

    public function attributes(): array {
        return ['orgName', 'orgOwnerId'];
    }

    public function rules(): array {
        return [
            'orgName' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]]
        ];
    }

    public function labels(): array {
        return [
            'orgName' => "Szervezet neve"
        ];
    }
}