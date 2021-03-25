<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrderDetail as OrderDetailModel;

/**
 * OrderDetail represents the model behind the search form of `backend\models\OrderDetail`.
 */
class OrderDetail extends OrderDetailModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_detail_id', 'order_id', 'pro_id', 'pro_price', 'status', 'created_at', 'updated_at'], 'integer'],
            [['pro_qty'], 'safe'],
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
    public function search($params, $order_id)
    {
        $query = OrderDetailModel::find();

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
            'order_detail_id' => $this->order_detail_id,
            'order_id' =>  $order_id,
            'pro_id' => $this->pro_id,
            'pro_price' => $this->pro_price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pro_qty', $this->pro_qty]);

        return $dataProvider;
    }
}
