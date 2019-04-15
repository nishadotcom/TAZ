<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\OnSale;

/**
 * OnSaleSearch represents the model behind the search form of `frontend\models\OnSale`.
 */
class OnSaleSearch extends OnSale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'on_sale_product_id'], 'integer'],
            [['discount'], 'number'],
            [['status', 'created_on'], 'safe'],
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
        $query = OnSale::find();

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
            'on_sale_product_id' => $this->on_sale_product_id,
            'discount' => $this->discount,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
