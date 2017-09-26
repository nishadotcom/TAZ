<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cart;

/**
 * CartSearch represents the model behind the search form about `frontend\models\Cart`.
 */
class CartSearch extends Cart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cart_user_id', 'cart_product_id', 'cart_product_owner_id', 'cart_product_quantity'], 'integer'],
            [['cart_product_category_name', 'cart_product_subcategory_NAME', 'cart_product_code', 'cart_product_name', 'cart_product_seo', 'cart_product_material', 'cart_product_color', 'cart_product_dimension_type', 'cart_product_short_description', 'cart_product_long_description', 'cart_product_discount', 'product_available_status', 'cart_added_on'], 'safe'],
            [['cart_product_price', 'cart_product_height', 'cart_product_length', 'cart_product_breadth', 'cart_product_weight'], 'number'],
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
        $query = Cart::find();

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
            'cart_user_id' => $this->cart_user_id,
            'cart_product_id' => $this->cart_product_id,
            'cart_product_owner_id' => $this->cart_product_owner_id,
            'cart_product_price' => $this->cart_product_price,
            'cart_product_height' => $this->cart_product_height,
            'cart_product_length' => $this->cart_product_length,
            'cart_product_breadth' => $this->cart_product_breadth,
            'cart_product_weight' => $this->cart_product_weight,
            'cart_product_quantity' => $this->cart_product_quantity,
            'cart_added_on' => $this->cart_added_on,
        ]);

        $query->andFilterWhere(['like', 'cart_product_category_name', $this->cart_product_category_name])
            ->andFilterWhere(['like', 'cart_product_subcategory_NAME', $this->cart_product_subcategory_NAME])
            ->andFilterWhere(['like', 'cart_product_code', $this->cart_product_code])
            ->andFilterWhere(['like', 'cart_product_name', $this->cart_product_name])
            ->andFilterWhere(['like', 'cart_product_seo', $this->cart_product_seo])
            ->andFilterWhere(['like', 'cart_product_material', $this->cart_product_material])
            ->andFilterWhere(['like', 'cart_product_color', $this->cart_product_color])
            ->andFilterWhere(['like', 'cart_product_dimension_type', $this->cart_product_dimension_type])
            ->andFilterWhere(['like', 'cart_product_short_description', $this->cart_product_short_description])
            ->andFilterWhere(['like', 'cart_product_long_description', $this->cart_product_long_description])
            ->andFilterWhere(['like', 'cart_product_discount', $this->cart_product_discount])
            ->andFilterWhere(['like', 'product_available_status', $this->product_available_status]);

        return $dataProvider;
    }
}
