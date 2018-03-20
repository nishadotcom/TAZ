<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FeatureSeller;

/**
 * FeatureSellerSearch represents the model behind the search form about `frontend\models\FeatureSeller`.
 */
class FeatureSellerSearch extends FeatureSeller
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'seller_id'], 'integer'],
            [['date_from', 'date_to', 'status', 'created_on'], 'safe'],
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
        $query = FeatureSeller::find();

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
            'seller_id' => $this->seller_id,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
