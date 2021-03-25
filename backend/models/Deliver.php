<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_deliver".
 *
 * @property int $deliver_id
 * @property string $deliver_name
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 */
class Deliver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_deliver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deliver_name', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['deliver_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'deliver_id' => 'Deliver ID',
            'deliver_name' => 'Deliver Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getAllDeliver(){
        $data = Deliver::find()->all();
        return $data;
    }
}
