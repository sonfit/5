<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product as ProductModel;

/**
 * Product represents the model behind the search form of `backend\models\Product`.
 */
class Product extends ProductModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_id', 'cate_id', 'prod_price', 'prod_qty', 'prod_status', 'created_at', 'updated_at'], 'integer'],
            [['prod_name', 'prod_slug', 'prod_image', 'prod_content', 'prod_desc'], 'safe'],
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
        $query = ProductModel::find();

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
            'prod_id' => $this->prod_id,
            'cate_id' => $this->cate_id,
            'prod_price' => $this->prod_price,
            'prod_qty' => $this->prod_qty,
            'prod_status' => $this->prod_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'prod_name', $this->prod_name])
            ->andFilterWhere(['like', 'prod_slug', $this->prod_slug])
            ->andFilterWhere(['like', 'prod_image', $this->prod_image])
            ->andFilterWhere(['like', 'prod_content', $this->prod_content])
            ->andFilterWhere(['like', 'prod_desc', $this->prod_desc]);

        return $dataProvider;
    }
}
