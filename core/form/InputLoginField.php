<?php

namespace app\core\form;

use app\core\Model;

class InputLoginField extends BaseLoginField {
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';

    public string $type;

    public function __construct(Model $model, string $attribute, string $icon) {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute, $icon);
    }

    public function renderInput(): string {
        $placeholder = $this->model->getLabel($this->attribute) ?? $this->attribute;
        return '<input type="' . $this->type . '" name="' . $this->attribute . '" value="' . $this->model->{$this->attribute} . '" placeholder="'.$placeholder.'" class="form-control' . ($this->model->hasError($this->attribute) ? ' is-invalid' : '') . '">';
    }

    public function passwordField(): static {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}