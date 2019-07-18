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
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这个广告吗?',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
                               'model' => $model,
                               'attributes' => [
                                   'id',
                                   'name',
                                   'principal',
                                   'progress',
                                   ['attribute'=>'picture_path',
                                    'label'=>'图片',
                                    'format'=>'raw',
                                    'value'=>function($model){
                                        return Html::img($model->picture_path,['width'=>'400px']);
                                    }
                                   ],
                                   'create_time',
                                   'update_time',
                               ],
                           ]) ?>
</div>
