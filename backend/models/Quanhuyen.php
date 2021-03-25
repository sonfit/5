<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_quanhuyen".
 *
 * @property string $maqh
 * @property string $name
 * @property string $type
 * @property string $matp
 */
class Quanhuyen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_quanhuyen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['maqh', 'name', 'type', 'matp'], 'required'],
            [['maqh', 'matp'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 30],
            [['maqh'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'maqh' => 'Maqh',
            'name' => 'Name',
            'type' => 'Type',
            'matp' => 'Matp',
        ];
    }

    public function getById($id){
        $data = Quanhuyen::find()->asArray()->where('matp=:id',['id'=>$id])->all();
        return $data;
    }
    public function getAllDictrict(){
        $data = Quanhuyen::find()->all();
        return $data;
    }

}
