<?php


use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Area;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model \app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '项目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('添加项目分段', ['projectchildren/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个项目吗?',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
                               'model' => $model,
                               'attributes' => [
                                   'id',
                                   'number',
                                   'name',
                                   ['attribute'=>'category',
                                    'value'=>function($model){
                                        return Category::getName($model->category);
                                    }],
                                   ['attribute'=>'province',
                                    'value'=>function($model){
                                    return Area::getName($model->province);
                                    }],
                                   ['attribute'=>'city',
                                    'value'=>function($model){
                                        return Area::getName($model->city);
                                    }],
                                   ['attribute'=>'area',
                                    'value'=>function($model){
                                        return Area::getName($model->area);
                                    }],
                                   ['attribute'=>'content',
                                    'format' => 'html'
                                   ],
                                   'create_time',
                                   'update_time',
                               ],
                           ]) ?>
</div>
