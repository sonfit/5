<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Categories as CategoriesModel;

/**
 * Categories represents the model behind the search form of `backend\models\Categories`.
 */
class Categories extends CategoriesModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_id', 'cate_status', 'created_at', 'updated_at'], 'integer'],
            [['cate_name', 'cate_slug', 'cate_parent', 'cate_desc'], 'safe'],
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
        $query = CategoriesModel::find();

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
            'cate_id' => $this->cate_id,
            'cate_status' => $this->cate_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'cate_name', $this->cate_name])
            ->andFilterWhere(['like', 'cate_slug', $this->cate_slug])
            ->andFilterWhere(['like', 'cate_parent', $this->cate_parent])
            ->andFilterWhere(['like', 'cate_desc', $this->cate_desc]);

        return $dataProvider;
    }
}
