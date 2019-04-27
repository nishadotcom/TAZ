<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserForgotPassword;

/**
 * UserForgotPasswordSearch represents the model behind the search form of `frontend\models\UserForgotPassword`.
 */
class ForgotpasswordSearch extends UserForgotPassword
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['password_key', 'expire_at', 'status', 'created_on'], 'safe'],
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
        $query = UserForgotPassword::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'expire_at' => $this->expire_at,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'password_key', $this->password_key])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
