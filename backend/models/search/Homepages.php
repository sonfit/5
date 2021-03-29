<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Homepages as HomepagesModel;

/**
 * Homepages represents the model behind the search form of `backend\models\Homepages`.
 */
class Homepages extends HomepagesModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['home_id', 'created_at', 'updated_at'], 'integer'],
            [['home_key', 'home_value'], 'safe'],
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
        $query = HomepagesModel::find();


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
            'home_id' => $this->home_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'home_key', $this->home_key])
            ->andFilterWhere(['like', 'home_value', $this->home_value]);


        return $dataProvider;
    }
}
