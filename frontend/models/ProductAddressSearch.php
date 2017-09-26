<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ProductAddress;

/**
 * ProductAddressSearch represents the model behind the search form about `frontend\models\ProductAddress`.
 */
class ProductAddressSearch extends ProductAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['street', 'city', 'state', 'country', 'pin_code'], 'safe'],
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
        $query = ProductAddress::find();

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
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'pin_code', $this->pin_code]);

        return $dataProvider;
    }
}
