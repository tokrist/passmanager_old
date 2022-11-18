<?php
/** @var $model \app\models\User */
/** @var $this app\core\View */

use app\core\form\Form;

$this->title = 'Bejelentkezés | PassManager';
?>

<div class="card-header text-center">
    <span class="h1"><b>Pass</b>Manager</span>
</div>
<div class="card-body">
    <p class="login-box-msg">Jelentkezzen be a munkamenet megkezdéséhez</p>

    <?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->authField($model, 'username', 'fa-solid fa-user');?>
    <?php echo $form->authField($model, 'password', 'fa-solid fa-lock')->passwordField();?>
    <div class="row">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-block">Bejelentkezés</button>
        </div>
    </div>
    <?php app\core\form\Form::end(); ?>

    <p class="mt-3 mb-1">
        <a href="/auth/forget">Elfelejtett jelszó</a>
    </p>
    <p class="mb-1">
        <a href="/auth/register">Új fiók regisztrálása</a>
    </p>
</div>