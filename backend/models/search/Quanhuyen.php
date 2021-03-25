<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Quanhuyen as QuanhuyenModel;

/**
 * Quanhuyen represents the model behind the search form of `backend\models\Quanhuyen`.
 */
class Quanhuyen extends QuanhuyenModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['maqh', 'name', 'type', 'matp'], 'safe'],
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
        $query = QuanhuyenModel::find();

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
        $query->andFilterWhere(['like', 'maqh', $this->maqh])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'matp', $this->matp]);

        return $dataProvider;
    }
}
