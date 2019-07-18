<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-6">
                <div class="col-sm-6">
                    <div class="form-group field-user-auth_key_old">
                        <label class="control-label" for="auth_key_old">原密码</label>
                        <input type="password" id="auth_key_old" class="form-control" placeholder="输入原密码">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'auth_key_new')->passwordInput(['placeholder' => '输入新密码'])->label('新密码') ?>
                </div>
                <div class="col-sm-6">
                    <div class="form-group field-user-auth_key_new_two">
                        <label class="control-label" for="auth_key_new_two">确认新密码</label>
                        <input type="password" id="auth_key_new_two" class="form-control" placeholder="再次输入新密码">
                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
