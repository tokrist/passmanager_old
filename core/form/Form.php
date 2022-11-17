<?php

namespace app\core\form;

use app\core\Model;

class Form {
    public static function begin($action, $method): Form {
        echo '<form action="' . $action . '" method="' . $method . '">';
        return new Form();
    }

    public static function end(): void {
        echo '</form>';
    }

    public function field(Model $model, $attribute): InputField {
        return new InputField($model, $attribute);
    }
}