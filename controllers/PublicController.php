<?php
/**
 * @link         http://www.rulaiyun.cn/
 * @author       wang <wangyaxu7019@dingtalk.com>
 * @copyright    Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace app\controllers;

use yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Area;
use app\models\Project;
use app\models\Category;

/**
 * 公共基控制器类 ，可做初始化操作
 * Class BaseController
 *
 * @package common\controllers
 */
class PublicController extends Controller
{
    /**
     * 获取全部项目统计数据
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIndex()
    {
        header('Access-Control-Allow-Origin:https://jlweb.rulaiyun.cn');
        Yii::$app->response->format = Response::FORMAT_JSON;
        $area = Yii::$app->request->get('area');
        $category = Yii::$app->request->get('category');
        if (!empty($area)) {
            if ($area < 37){
                $map['province'] = $area;
            }else {
                $map['city'] = $area;
            }
        }
        if (!empty($category)) {
            $map['category'] = $category;
        }
        $array = Project::find()->where($map)->with('children')->asArray()->all();
        foreach ($array as $key=>$value) {
            $array[$key]['province'] = Area::getName($array[$key]['province']);
            $array[$key]['city'] = Area::getName($array[$key]['city']);
            $array[$key]['area'] = Area::getName($array[$key]['area']);
            $array[$key]['category'] = Category::getName($array[$key]['category']);
           if (empty($value['children'])){
               $array[$key]['progress'] = 100;
           }else {
               $array[$key]['progress'] = 0;
               foreach ($value['children'] as $val) {
                   $array[$key]['progress'] += $val['progress'];
               }
               $array[$key]['progress'] = round($array[$key]['progress'] / sizeof($value['children']),2);
           }
        }

        return $array;

    }

    /**
     * 获取省市数据
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProvince()
    {
        header('Access-Control-Allow-Origin:https://jlweb.rulaiyun.cn');
        Yii::$app->response->format = Response::FORMAT_JSON;
        $array = Project::find()->select('province')->groupBy('province')->asArray()->all();
        foreach ($array as $key=>$value) {
            $array[$key]['province_name'] = Area::getName($array[$key]['province']);
            $array[$key]['city'] = Project::find()->select('city')->where(['province'=>$array[$key]['province']])->groupBy('city')->asArray()->all();
            foreach ($array[$key]['city'] as $k=>$v) {
                $array[$key]['city'][$k]['city_name'] = Area::getName($array[$key]['city'][$k]['city']);
            }
        }
        return $array;
    }

    /**
     * 获取市下级各县详细数据
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCity()
    {
        header('Access-Control-Allow-Origin:https://jlweb.rulaiyun.cn');
        Yii::$app->response->format = Response::FORMAT_JSON;
        $city = Yii::$app->request->get('city');
        if (empty($city)) {
            return ['code'=>201,'msg'=>'参数不能为空!'];
        } elseif($city < 37){
            $param = 'province';
            $group = 'city';
        }else {
            $param = 'city';
            $group = 'area';
        }
        $array = Project::find()->select('area,city,count(id) as count')->where([$param=>$city])->groupBy($group)->orderBy('count DESC')->asArray()->all();
        foreach ($array as $key=>$value) {
            $array[$key]['city_name'] = Area::getName($array[$key]['city']);
            $array[$key]['area_name'] = Area::getName($array[$key]['area']);
        }
        return $array;

    }

    /**
     * 获取分类详细数据
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCategory()
    {
        header('Access-Control-Allow-Origin:https://jlweb.rulaiyun.cn');
        Yii::$app->response->format = Response::FORMAT_JSON;
        $city = Yii::$app->request->get('city');
        if (empty($city)) {
            return ['code'=>201,'msg'=>'参数不能为空!'];
        } elseif($city < 37){
            $param = 'province';
        }else {
            $param = 'city';
        }

        $array = Project::find()->select('category,count(id) as count')->where([$param=>$city])->groupBy('category')->asArray()->all();
        foreach ($array as $key=>$value) {
            $array[$key]['category_name'] = Category::getName($array[$key]['category']);
        }
        return $array;

    }


}
