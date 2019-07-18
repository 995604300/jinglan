<?php
/**
 * @link         http://www.rulaiyun.cn/
 * @author       wang <wangyaxu7019@dingtalk.com>
 * @copyright    Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace app\controllers;


use app\models\User;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

/**
 * 首页控制器
 * Class IndexController
 *
 * @package backend\controllers
 * @author  wang
 */
class IndexController extends BaseController
{

    public $enableCsrfValidation = false;    //取消 Csrf 验证


    /**
     * 进入首页
     *
     * @return string
     * @author wang
     */
    public function actionWelcome()
    {
        return $this->render('welcome', [
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    /**
     * 修改账号信息
     *
     * @param array $_POST ajax传值
     * @return 渲染页面或true
     * @author meikunpeng
     */
    public function actionUpdate()
    {

        /* 获取当前用户数据库对象 */
        $model = $this->findModel(\Yii::$app->user->identity->getId());

        if(\Yii::$app->request->isPost){
            $post = \Yii::$app->request->post();
            if(\Yii::$app->getSecurity()->validatePassword($post['key_old'],$model->password_hash)){
                if($post['key_new'] == $post['key_two']){
                    $newPass = \Yii::$app->getSecurity()->generatePasswordHash($post['key_new']);
                    $model->password_hash = $newPass;
                    $r = $model->save();
                    if($r){
                        return 1;
                    }else{
                        return 4;
                    }
                } else {
                    return 3;
                }
            }else{
                return 2;
            }
        }

        /* 渲染弹窗 */
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 根据主键值查找用户模型。
     * 如果找不到模型，将会抛出一个404 HTTP异常。
     *
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的页面不存在。');
    }
}

