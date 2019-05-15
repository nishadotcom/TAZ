<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_category_id', 'product_subcategory_id', 'product_owner_id'], 'integer'],
            [['product_code', 'product_name', 'product_material', 'product_color', 'product_dimension_type', 'product_short_description', 'product_long_description', 'product_discount_status', 'product_guarantee_status', 'product_status', 'created_on', 'updated_on'], 'safe'],
            [['product_price', 'product_sale_price', 'product_retail_price', 'product_height', 'product_length', 'product_breadth', 'product_weight'], 'number'],
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
        $url = Yii::$app->homeUrl;
        if(strpos($url, "backend")){
            $query = Product::find()->orderBy(['id'=>SORT_DESC]);
        }else{
            $query = Product::find()->with('productImages')->where(['product_owner_id'=>Yii::$app->user->id])->orderBy(['id'=>SORT_DESC]);
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
            'product_category_id' => $this->product_category_id,
            'product_subcategory_id' => $this->product_subcategory_id,
            'product_owner_id' => $this->product_owner_id,
            'product_price' => $this->product_price,
            'product_sale_price' => $this->product_sale_price,
            'product_retail_price' => $this->product_retail_price,
            'product_height' => $this->product_height,
            'product_length' => $this->product_length,
            'product_breadth' => $this->product_breadth,
            'product_weight' => $this->product_weight,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_material', $this->product_material])
            ->andFilterWhere(['like', 'product_color', $this->product_color])
            ->andFilterWhere(['like', 'product_dimension_type', $this->product_dimension_type])
            ->andFilterWhere(['like', 'product_short_description', $this->product_short_description])
            ->andFilterWhere(['like', 'product_long_description', $this->product_long_description])
            ->andFilterWhere(['like', 'product_discount_status', $this->product_discount_status])
            ->andFilterWhere(['like', 'product_guarantee_status', $this->product_guarantee_status])
            ->andFilterWhere(['like', 'product_status', $this->product_status]);

        return $dataProvider;
    }
}
