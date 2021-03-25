<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_order_detail".
 *
 * @property int $order_detail_id
 * @property int $order_id
 * @property int $pro_id
 * @property int $pro_price
 * @property int $pro_qty
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'pro_id', 'pro_price', 'pro_qty', 'created_at', 'updated_at'], 'required'],
            [['order_id', 'pro_id', 'pro_price', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_detail_id' => 'Order Detail ID',
            'order_id' => 'Order ID',
            'pro_id' => 'Pro ID',
            'pro_price' => 'Pro Price',
            'pro_qty' => 'Pro Qty',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
