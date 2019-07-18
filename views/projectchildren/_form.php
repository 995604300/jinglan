<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<?php  $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <?=$form->field($model, 'parent_id')->hiddenInput(['maxlength' => true])->label(false); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <?=$form->field($model, 'name')->textInput(['maxlength' => true ]); ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?=$form->field($model, 'principal')->textInput(['maxlength' => true ]); ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?=$form->field($model, 'progress')->textInput(['maxlength' => true ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <label class="control-label" for="video-uploadFile">图片文件</label>
                    <?= FileInput :: widget([
                                                'model' => $model,
                                                'attribute' => 'uploadFile',
                                                'options' => ['multiple' => false],
                                                'pluginOptions' => [
                                                    'initialPreview' => [
                                                        "$model->picture_path"
                                                    ],
                                                    'initialPreviewAsData' => true ,
                                                    'overwriteInitial' => false ,
                                                    'maxFileSize' => 2800,
                                                    'initialCaption' => "原图片",
                                                    'initialPreviewConfig' => [
                                                        [ 'caption' => '原图片'],
                                                    ],

                                                ],
                                            ])
                    ?>
                </div>
            </div>
        </div>
    </div>




    <div class="text-center">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


