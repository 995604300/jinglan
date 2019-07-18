<?php
/**
 * @package    http://www.rulaiyun.cn/
 * @author     wang <wangyaxu7019@dingtalk.com>
 * @copyright  Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "jl_user".
 *
 * @property int    $id
 * @property string $username             帐号
 * @property string $auth_key             密钥
 * @property string $password_hash        密码
 * @property string $password_reset_token 密码重置TOKEN
 * @property string $create_time          创建时间
 * @property string $update_time          更新时间
 */
class User extends ActiveRecord implements IdentityInterface
{
    const  USER_ACTIVE = 1;    //开启
    const  USER_INACTIVE = 0;    //冻结

    public $auth_key_new;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'username'
                ],
                'required',
            ],
            [
                [
                    'username',
                ],
                'unique',
            ],
            [
                [
                    'username',
                    'auth_key',
                ],
                'string',
                'max' => 32,
            ],
            [
                [
                    'password_hash',
                    'password_reset_token',
                ],
                'string',
                'max' => 255,
            ],
            [
                [
                    'auth_key',
                ],
                'safe'
            ]
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '登陆账号',
            'auth_key' => '密钥',
            'password_hash' => '密码',
            'password_reset_token' => '密码重置令牌',
            'create_time' => '创建日期',
            'update_time' => '更新日期',
        ];
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * Implemented for Oauth2 Interface
     *
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        return null;
    }

    /**
     * Implemented for Oauth2 Interface
     */
    public function checkUserCredentials($username, $password)
    {
        $user = static::findByUsername($username);
        if (empty($user)) {
            return false;
        }
        return $user->validatePassword($password);
    }

    /**
     * Implemented for Oauth2 Interface
     */
    public function getUserDetails($username)
    {
        $user = static::findByUsername($username);
        return ['user_id' => $user->getId()];
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                                   'password_reset_token' => $token,
                               ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }



    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString().'_'.time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @param bool $insert
     * @return bool
     * @author wang
     */
    public function beforeSave($insert)
    {
        if ($insert) {    //新增


        } else {    //修改

        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * @param bool  $insert
     * @param array $changedAttributes
     * @author wang
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * 删除之后
     */
    public function afterDelete()
    {
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }


}
