<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseLoginField {
    public Model $model;
    public string $attribute;
    private string $icon;

    abstract public function renderInput(): string;

    /**
     * @param Model $model
     * @param string $attribute
     * @param string $icon
     */
    public function __construct(Model $model, string $attribute, string $icon) {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->icon = $icon;
    }

    public function __toString(): string {
        return sprintf('
            <div class="input-group has-validation mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="%s"></span>
                    </div>
                </div>
                %s
                <div class="invalid-feedback">%s</div>
            </div>
        ',
            $this->icon,
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)

        );
    }
}