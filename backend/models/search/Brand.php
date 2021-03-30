<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Brand as BrandModel;

/**
 * Brand represents the model behind the search form of `backend\models\Brand`.
 */
class Brand extends BrandModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'brand_status', 'created_at', 'updated_at'], 'integer'],
            [['brand_name', 'brand_slug', 'brand_desc'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = BrandModel::find();

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
            'brand_id' => $this->brand_id,
            'brand_status' => $this->brand_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'brand_name', $this->brand_name])
            ->andFilterWhere(['like', 'brand_slug', $this->brand_slug])
            ->andFilterWhere(['like', 'brand_desc', $this->brand_desc]);

        return $dataProvider;
    }
}
