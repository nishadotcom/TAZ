<?php

namespace app\modules\defaults\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\defaults\models\ProjectLocation;

/**
 * ProjectLocationSearch represents the model behind the search form about `app\modules\defaults\models\ProjectLocation`.
 */
class ProjectLocationSearch extends ProjectLocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code', 'name', 'address', 'locationMap'], 'safe'],
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
        $query = ProjectLocation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
                'defaultOrder'=> ['id' => SORT_DESC
                    ]
                ],
             'pagination' => [
            'pagesize' => Yii::$app->params['pagesize'] // in case you want a default pagesize change it in config page
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'locationMap', $this->locationMap]);

        return $dataProvider;
    }
}
