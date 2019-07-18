<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loginPage">
    <div class="loginBox">
        <div class="login-div-container">
            <div>
                <div style="margin-bottom: 20px" class="text-center">
                    <h3 class="systemName">安徽精蓝测绘管理平台</h3>
                </div>
                <div class="row">
                    <div class="">
                        <div class="login-box">
                            <div class="login-box-body">
                                <?php $form = ActiveForm::begin([
                                                                    'id' => 'login-form',
                                                                    'validateOnBlur' => false,
                                                                    'validateOnChange' => false
                                                                ]) ?>
                                <div class="form-group has-feedback">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <?= $form->field($model, 'username')->textInput([
                                                                                        'class' => 'form-control login-input',
                                                                                        'placeholder' => '请输入用户名'
                                                                                    ])->label(false) ?>
                                </div>
                                <div class="form-group has-feedback">
                                    <?= $form->field($model, 'password')->passwordInput([
                                                                                            'class' => 'form-control login-input',
                                                                                            'placeholder' => '请输入密码'
                                                                                        ])->label(false) ?>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox" style="text-align: left">
                                            <?= $form->field($model, 'rememberMe')->checkbox(['style' => ['margin-top']])->label('记住密码') ?>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <?= Html::submitButton('登录', [
                                            'class' => 'btn btn-info btn-block btn-flat',
                                            'name' => 'login-button'
                                        ]) ?>
                                    </div>
                                    <div class="col-xs-12 other-fun">
                                        <!--                                            <span class="forget-pwd" data-toggle="modal"-->
                                        <!--                                                  data-target="#forgetPwd">忘记密码</span>-->
                                        <!--                                            <span class="register" data-toggle="modal"-->
                                        <!--                                                  data-target="#register">立即注册</span>-->
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (window.parent.index)
    {
        window.parent.window.location.reload();
    }
</script>
