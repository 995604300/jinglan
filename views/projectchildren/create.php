<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = '创建项目分段';
$this->params['breadcrumbs'][] = ['label' => '项目列表', 'url' => ['project/index','type'=>Yii::$app->request->get('type')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">
    <div class="dictionary-create">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>