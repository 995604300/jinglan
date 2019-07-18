<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = '更新项目分类 ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '项目分类列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="wrapper wrapper-content ">
    <div class="ibox-content">
        <div class="row pd-10">
            <h1><?= Html::encode($this->title) ?></h1>
            <hr>
            <?= $this->render('_form', [
                'model' => $model,
                'disabled' => true
            ]) ?>
        </div>

    </div>
</div>