<?php
/** @var $model \app\models\User */
/** @var $this app\core\View */

use app\core\form\Form;

$this->title = 'Regisztráció | PassManager';
?>

<div class="card-header text-center">
    <span class="h1"><b>Pass</b>Manager</span>
</div>
<div class="card-body">
    <p class="login-box-msg">Regisztráljon új fiókot</p>

    <?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->authField($model, 'userFullname', 'fa-solid fa-signature');?>
    <?php echo $form->authField($model, 'userUsername', 'fa-solid fa-user');?>
    <?php echo $form->authField($model, 'userEmail', 'fa-solid fa-at');?>
    <?php echo $form->authField($model, 'userPassword', 'fa-solid fa-lock')->passwordField();?>
    <?php echo $form->authField($model, 'confirmPassword', 'fa-solid fa-lock')->passwordField();?>
    <div class="row">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-block">Bejelentkezés</button>
        </div>
    </div>
    <?php app\core\form\Form::end(); ?>

    <p class="mt-3 mb-1">
        <a href="/auth/login">Már van fiókom</a>
    </p>
</div>