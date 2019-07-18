<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo "<div style='overflow: auto;max-height: 300px;'><table class=\"table table-bordered table-condensed table-hover small kv-table\">
<tr>
<th>项目分段名称</th>
<th>项目负责人</th>
<th>分段进度</th>
<th>创建时间</th>
<th>操作</th>
</tr>";
foreach ($model as $value){


    echo "<tr><td>$value->name</td>
          <td>$value->principal</td>
          <td>$value->progress %</td>
          <td>$value->create_time</td>
          <td>".Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::toRoute(['projectchildren/view', 'id' => $value->id]), [
            'title' => Yii::t('yii', '查看'),
            'aria-label' => Yii::t('yii', '查看'),
            'data-pjax' => '0',
            'style' => 'margin:0 10px'
                ]),
                Html::a('<span class="glyphicon glyphicon-pencil text-warning"></span>', Url::toRoute(['projectchildren/update', 'id' => $value->id]), [
                    'title' => Yii::t('yii', '更新'),
                    'aria-label' => Yii::t('yii', '更新'),
                    'data-pjax' => '0',
                    'style' => 'margin:0 20px'
                ]),
                Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>', Url::toRoute(['projectchildren/delete', 'id' => $value->id]), [
                    'title' => Yii::t('yii', '删除'),
                    'aria-label' => Yii::t('yii', '删除'),
                    'data-confirm' => Yii::t('yii', '您确定要删除吗？'),
                    'data-pjax' => '0',
                    'style' => 'margin:0 10px'
                ])
                ."</td>
          </tr>";
}
echo "</table></div>";
?>
