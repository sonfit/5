<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order as OrderModel;

/**
 * Order represents the model behind the search form of `backend\models\Order`.
 */
class Order extends OrderModel
{
    public $username;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'total', 'payment_id', 'deliver_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['user_ship', 'username', 'email_ship', 'phone_ship', 'add_ship', 'province_ship', 'dictrict_ship', 'ward_ship', 'resquest'], 'safe'],
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
        $query = OrderModel::find();
        $query->joinWith(['user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['username'] = [
                'asc'=> ['username'=>SORT_ASC],
                'desc'=>['username'=>SORT_DESC]
            ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'total' => $this->total,
            'payment_id' => $this->payment_id,
            'deliver_id' => $this->deliver_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user_ship', $this->user_ship])
            ->andFilterWhere(['like', 'email_ship', $this->email_ship])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'phone_ship', $this->phone_ship])
            ->andFilterWhere(['like', 'add_ship', $this->add_ship])
            ->andFilterWhere(['like', 'province_ship', $this->province_ship])
            ->andFilterWhere(['like', 'dictrict_ship', $this->dictrict_ship])
            ->andFilterWhere(['like', 'ward_ship', $this->ward_ship])
            ->andFilterWhere(['like', 'resquest', $this->resquest]);

        return $dataProvider;
    }
}
