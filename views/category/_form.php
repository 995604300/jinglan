<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\file\FileInput;
use backend\models\Area;
use backend\models\Industry;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>


<?php  $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?=$form->field($model, 'number')->textInput(['maxlength' => true ,'disabled'=>$disabled]); ?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

        </div>
    </div>




    <div class="text-center">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


