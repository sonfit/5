<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_banner".
 *
 * @property int $banner_id
 * @property string $banner_title
 * @property string|null $banner_des
 * @property string|null $banner_button_link
 * @property string|null $banner_button_text
 * @property string|null $banner_status
 * @property int $created_at
 * @property int $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_banner';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [['banner_title', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['banner_title', 'banner_des', 'banner_button_link', 'banner_button_text', 'banner_status','banner_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'banner_title' => 'Banner Title',
            'banner_des' => 'Banner Des',
            'banner_button_link' => 'Banner Button Link',
            'banner_button_text' => 'Banner Button Text',
            'banner_status' => 'Banner Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public  function getBanner($status){
        $data = Banner::find()->where(['banner_status'=>$status])->all();
        return $data;
    }
}
