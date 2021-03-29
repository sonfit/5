<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Banner as BannerModel;

/**
 * Banner represents the model behind the search form of `backend\models\Banner`.
 */
class Banner extends BannerModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banner_id', 'created_at', 'updated_at'], 'integer'],
            [['banner_title', 'banner_des', 'banner_button_link', 'banner_button_text', 'banner_status','banner_image'], 'safe'],
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
        $query = BannerModel::find();

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
            'banner_id' => $this->banner_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'banner_title', $this->banner_title])
            ->andFilterWhere(['like', 'banner_des', $this->banner_des])
            ->andFilterWhere(['like', 'banner_button_link', $this->banner_button_link])
            ->andFilterWhere(['like', 'banner_button_text', $this->banner_button_text])
            ->andFilterWhere(['like', 'banner_status', $this->banner_status]);

        return $dataProvider;
    }
}
