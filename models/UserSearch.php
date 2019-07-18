<?php
/**
 * @package    http://www.rulaiyun.cn/
 * @author     wang <wangyaxu7019@dingtalk.com>
 * @copyright  Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace backend\models;

use app\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form of `backend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [
                [
                    'username',
                    'nick_name',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                    'mobile',
                    'create_time',
                    'update_time',
                ],
                'safe',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here
        $pageSize = isset($params['per-page']) ? intval($params['per-page']) : 10;
        $dataProvider = new ActiveDataProvider([
                                                   'query' => $query,
                                                   'sort' => ['defaultOrder' => ['id' => SORT_DESC]], // 新增配置项 默认 id 倒序
                                                   'pagination' => ['pageSize' => $pageSize],
                                               ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        /*创建日期*/
        if (!empty($this->create_time)) {
            $createdDate = explode(' - ', $this->create_time);
            $createdAt = $createdDate[0];
            $createdAtEnd = $createdDate[1];
            $query->andWhere("create_time >= '$createdAt 00:00:00' AND create_time <= '$createdAtEnd 23:59:59'");
        }

        /*修改日期*/
        if (!empty($this->update_time)) {
            $updatedDate = explode(' - ', $this->update_time);
            $updatedAt = $updatedDate[0];
            $updatedAtEnd = $updatedDate[1];
            $query->andWhere("update_time >= '$updatedAt 00:00:00' AND update_time <= '$updatedAtEnd 23:59:59'");
        }


        // grid filtering conditions
        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status,]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }

}
