<?php
/**
 * @link         http://www.rulaiyun.cn/
 * @author       wang <wangyaxu7019@dingtalk.com>
 * @copyright    Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace app\controllers;

use yii;
use yii\web\Controller;

/**
 * 公共基控制器类 ，可做初始化操作
 * Class BaseController
 *
 * @package common\controllers
 */
class BaseController extends Controller
{
    public function beforeAction($action)
    {
        //如果未登录，则直接返回
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }
        return true;
    }
}
