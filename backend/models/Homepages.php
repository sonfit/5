<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_homepages".
 *
 * @property int $home_id
 * @property string $home_key
 * @property string|null $home_value
 * @property int $created_at
 * @property int $updated_at
 */
class Homepages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_homepages';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public $slide_title;
    public $slide_des;
    public $slide_button_link;
    public $slide_button_text;
    public function rules()
    {
        return [
            [['home_key', 'created_at', 'updated_at'], 'required'],
            [['home_value','slide_title','slide_des','slide_button_link','slide_button_text'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['home_key'], 'string', 'max' => 255],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'home_id' => 'Home ID',
            'home_key' => 'Home Key',
            'home_value' => 'Home Value',
            'slide_title'=> 'Tiêu đề',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public  function getSlide(){
        $data = Homepages::find()->where(['home_key'=>'slides_topbanner'])->one();
        return $data->home_value;
    }
    public function updateSlide($data){
        Homepages::find()->where(['home_key'=>'slides_topbanner'])->one();
        return $this->update($data);

    }
}
