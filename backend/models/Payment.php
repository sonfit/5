<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_payment".
 *
 * @property int $pay_id
 * @property string $pay_name
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pay_name', 'status', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['pay_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pay_id' => 'Pay ID',
            'pay_name' => 'Pay Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public  function getAllPayment(){
        $data = Payment::find()->all();
        return $data;
    }
}
