<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_xaphuongthitran".
 *
 * @property string $xaid
 * @property string $name
 * @property string $type
 * @property string $maqh
 */
class Xaphuongthitran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_xaphuongthitran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xaid', 'name', 'type', 'maqh'], 'required'],
            [['xaid', 'maqh'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 30],
            [['xaid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'xaid' => 'Xaid',
            'name' => 'Name',
            'type' => 'Type',
            'maqh' => 'Maqh',
        ];
    }
    public function getById($id){
        $data = Xaphuongthitran::find()->asArray()->where('maqh=:id',['id'=>$id])->all();
        return $data;
    }
    public function getAllWards(){
        $data = Xaphuongthitran::find()->all();
        return $data;
    }
}
