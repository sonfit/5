<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_brand".
 *
 * @property int $brand_id
 * @property string $brand_name
 * @property string $brand_slug
 * @property string|null $brand_desc
 * @property int $brand_status
 * @property int $created_at
 * @property int $updated_at
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name', 'brand_slug', 'created_at', 'updated_at'], 'required'],
            [['brand_status', 'created_at', 'updated_at'], 'integer'],
            [['brand_name', 'brand_slug', 'brand_desc'], 'string', 'max' => 255],
            [['brand_name'], 'unique'],
            [['brand_slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => 'Brand ID',
            'brand_name' => 'Brand Name',
            'brand_slug' => 'Brand Slug',
            'brand_desc' => 'Brand Desc',
            'brand_status' => 'Brand Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getBrand(){
        $data = Brand::find()->all();
        return $data;
    }
}
