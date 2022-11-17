<?php

namespace app\core\form;

use app\core\Model;

class InputField extends BaseField {
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';

    public string $type;

    public function __construct(Model $model, string $attribute) {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    public function renderInput(): string {
        return '<input type="' . $this->type . '" name="' . $this->attribute . '" value="' . $this->model->{$this->attribute} . '" class="form-control' . ($this->model->hasError($this->attribute) ? ' is-invalid' : '') . '">';
    }

    public function passwordField(): static {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}