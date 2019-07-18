<?php

use yii\helpers\Html;
use app\components\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\CategorySearch */
/* @var $context \app\controllers\CategoryController */
$this->title = '项目分类列表';
$this->params['breadcrumbs'][] = $this-> title;
?>

<div class="wrapper wrapper-content" style="margin-top: 40px">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="btn-group pull-right" style="margin-bottom: 10px;" role="group">
                <?= Html::a('创建项目分类 ', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php $gridColumns = [
        [
            'class' => 'app\components\grid\SerialColumn'
        ],
        [
            'attribute'=>'number',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'headerOptions' => ['class' => 'kv-sticky-column'],
            'contentOptions' => ['class' => 'kv-sticky-column'],
        ],
        [
            'attribute'=>'name',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'headerOptions' => ['class' => 'kv-sticky-column'],
            'contentOptions' => ['class' => 'kv-sticky-column'],
        ],
        [
            'attribute' => 'create_time',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'headerOptions' => ['class' => 'kv-sticky-column'],
            'contentOptions' => ['class' => 'kv-sticky-column'],
            'width' => '220px',
            'filter' => DateRangePicker::widget([    // 日期组件
                                                'model' => $searchModel,
                                                'language' => Yii::$app->language,
                                                'attribute' => 'create_time',
                                           ]),
        ],
        [
            'attribute' => 'update_time',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'headerOptions' => ['class' => 'kv-sticky-column'],
            'contentOptions' => ['class' => 'kv-sticky-column'],
            'width' => '220px',
            'filter' => DateRangePicker::widget([    // 日期组件
                                                'model' => $searchModel,
                                                'language' => Yii::$app->language,
                                                'attribute' => 'update_time',
                                           ]),
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'header' => '操作',
            'template' => '{view}{update}{delete}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', '查看'),
                        'aria-label' => Yii::t('yii', '查看'),
                        'data-pjax' => '0',
                        'style' => 'margin:0 10px'
                    ];
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options) ;
                },
                'update' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', '更新'),
                        'aria-label' => Yii::t('yii', '更新'),
                        'data-pjax' => '0',
                        'style' => 'margin:0 20px'
                    ];
                    $urlType = $url;
                    return Html::a('<span class="glyphicon glyphicon-pencil text-warning"></span>', $urlType, $options) ;
                },
                'delete' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', '删除'),
                        'aria-label' => Yii::t('yii', '删除'),
                        'data-confirm' => Yii::t('yii', '将会删除该分类下所有项目,确定要删除吗？'),
                        'data-pjax' => '0',
                        'style' => 'margin:0 10px'
                    ];
                    $urlType = $url;
                    return Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>', $urlType, $options ) ;
                },

            ],
            'headerOptions' => ['width' => '100'],
        ],

    ]; ?>

    <div class="ibox float-e-margins" style="margin-top: 10px">
        <div class="ibox-title" style="position: relative;">
            <h5 style="float: left;"> <?=$this->title?></h5>
        </div>
        <div class="ibox-content">
            <?= GridView::widget([
                                     'id' => 'kv-grid-user',
                                     'dataProvider' => $dataProvider,
                                     'filterModel' => $searchModel,
                                     'columns' => $gridColumns,
                                     'containerOptions' => ['style' => 'overflow: auto'],
                                     'resizableColumns' => true,
                                     'bordered' => true,
                                     'striped' => false,
                                     'condensed' => false,
                                     'responsive' => true,
                                     'hover' => true,
                                     //  'showPageSummary' => true,
                                     'filterSelector' => "select[name='" . $dataProvider->getPagination()->pageSizeParam . "'],input[name='" . $dataProvider->getPagination()->pageParam . "']",
                                     'pager' => [
                                         'class' => \yii\widgets\LinkPager::className(),
                                     ],

                                 ]); ?>
        </div>

    </div>
</div>
<script>

</script>