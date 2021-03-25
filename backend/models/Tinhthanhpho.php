<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_tinhthanhpho".
 *
 * @property string $matp
 * @property string $name
 * @property string $type
 */
class Tinhthanhpho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_tinhthanhpho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matp', 'name', 'type'], 'required'],
            [['matp'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 30],
            [['matp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'matp' => 'Matp',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    public function getAllProvince(){
        $data = Tinhthanhpho::find()->all();
        return $data;
    }
}
