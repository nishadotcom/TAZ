<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\OrderDetail;

/**
 * OrderDetailSearch represents the model behind the search form of `frontend\models\OrderDetail`.
 */
class OrderDetailSearch extends OrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'product_id', 'product_owner_id'], 'integer'],
            [['category_name', 'subcategory_name', 'product_code', 'product_name', 'product_seo', 'seller_name', 'product_material', 'product_color', 'product_description', 'created_on'], 'safe'],
            [['product_price', 'product_height', 'product_length', 'product_breadth', 'product_weight'], 'number'],
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
        $query = OrderDetail::find();
        if(Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_SELLER']){
            $query = OrderDetail::find()->joinWith('order')->where(['product_owner_id'=>Yii::$app->user->id])->andWhere('taz_order.order_status<>"USER CANCELLED"')->andWhere('taz_order.order_status<>"FAILED-TRANSACTION"')->andWhere('taz_order.order_status<>"CANCELLED"')->orderBy(['id'=>SORT_DESC]);
        }

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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'product_owner_id' => $this->product_owner_id,
            'product_price' => $this->product_price,
            'product_height' => $this->product_height,
            'product_length' => $this->product_length,
            'product_breadth' => $this->product_breadth,
            'product_weight' => $this->product_weight,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'subcategory_name', $this->subcategory_name])
            ->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_seo', $this->product_seo])
            ->andFilterWhere(['like', 'seller_name', $this->seller_name])
            ->andFilterWhere(['like', 'product_material', $this->product_material])
            ->andFilterWhere(['like', 'product_color', $this->product_color])
            ->andFilterWhere(['like', 'product_description', $this->product_description]);

        $dataProvider->sort->attributes['order_status'] = [
            'asc' => ['taz_order.order_status' => SORT_ASC],
            'desc' => ['taz_order.order_status' => SORT_DESC],
        ];

        return $dataProvider;
    }
}
