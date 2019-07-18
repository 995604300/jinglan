<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\file\FileInput;
use app\models\Area;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>


<?php  $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <?=$form->field($model, 'number')->textInput(['maxlength' => true ,'disabled'=>$disabled]); ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?=$form->field($model, 'name')->textInput(['maxlength' => true ]); ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?= $form->field($model, 'category')->widget(Select2::classname(), [
                        'data' => \app\models\Category::getCategories(),
                        'options' => ['placeholder' => '选择项目分类'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <?= $form->field($model, 'province')->widget(Select2::classname(), [
                        'data' => Area::getSubcat(),
                        'options' => ['placeholder' => '请选择'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?= $form->field($model, 'city')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'data' =>[$model->city => Area::getName($model->city)],
                        'options' => ['placeholder' => '请选择'],
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['project-province'],
                            'url' => Url::to(['/setting/get-subcat']),
                            'loadingText' => '正在加载',
                        ]
                    ]);?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?= $form->field($model, 'area')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'data' =>[$model->area => Area::getName($model->area)],
                        'options' => ['placeholder' => '请选择'],
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['project-city'],
                            'url' => Url::to(['/setting/get-subcat']),
                            'loadingText' => '正在加载',
                        ]
                    ]);?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?= $form->field($model, 'content')->widget(\kucha\ueditor\UEditor::className(), [
                                                'clientOptions' => [
                                                    //编辑区域大小
                                                    'initialFrameHeight' => '200',
                                                    //设置语言
                                                    'lang' =>'zh-cn', //中文为 zh-cn
                                                    //定制菜单
                                                    'toolbars' => [
                                                        [
                                                            'fullscreen', 'source', 'undo', 'redo', '|',
                                                            'fontsize',
                                                            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                                                            'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                                                            'forecolor', 'backcolor', '|',
                                                            'lineheight', '|',
                                                            'indent', '|','simpleupload'
                                                        ],
                                                    ]
                                                ]
                                                       ]) ?>
                </div>
            </div>
        </div>
    </div>




    <div class="text-center">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


