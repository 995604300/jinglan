<?php
/**
 * @link         http://www.rulaiyun.cn/
 * @author       wang <wangyaxu7019@dingtalk.com>
 * @copyright    Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace app\controllers;

use yii\helpers\Json;
use yii\web\Response;
use yii\web\Controller;
use app\models\Area;

/**
 * Class SettingController 系统设置
 *
 * @package app\controllers
 */
class SettingController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors(){
        return [];
    }

    /**
     * 删除系统缓存
     *
     * @author yaoliang 2018年1月15日 13:26:54
     */
    public function actionFlushCache()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        \Yii::$app->cache->flush();
        return ['code' => 1,'message' => "清除缓存成功"];
    }

    public function actionGetSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = Area::find()->andWhere(['parent_id'=>$id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id'], 'name' => $account['name']];
                    if ($i == 0) {
                        $selected = $account['id'];
                    }
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected'=>'']);
    }
}
