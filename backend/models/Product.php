<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_product".
 *
 * @property int $prod_id
 * @property int $cate_id
 * @property int $brand_id
 * @property string $prod_name
 * @property string $prod_slug
 * @property string $prod_image
 * @property string $prod_content
 * @property string $prod_desc
 * @property int|null $prod_price
 * @property int|null $prod_qty
 * @property int $prod_status
 * @property int $created_at
 * @property int $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public $qtt;
    public function rules()
    {
        return [
            [['cate_id', 'brand_id', 'prod_name', 'prod_slug', 'prod_image', 'prod_content', 'prod_desc', 'created_at', 'updated_at'], 'required'],
            [['prod_price', 'prod_qty', 'prod_status', 'created_at', 'updated_at'], 'integer'],
            [['prod_content'], 'string'],
            [['prod_name', 'prod_slug', 'prod_image'], 'string', 'max' => 255],
            [['prod_name'], 'unique'],
            [['prod_slug'], 'unique'],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prod_id' => 'Prod ID',
            'cate_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'prod_name' => 'Tên sản phẩm',
            'prod_slug' => 'Prod Slug',
            'prod_image' => 'Hình ảnh',
            'prod_content' => 'Mô tả',
            'prod_desc' => 'Mô tả ngắn',
            'prod_price' => 'Giá',
            'prod_qty' => 'Số lượng',
            'prod_status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getBrand(){
        return $this->hasOne(Brand::className(),['brand_id'=>'brand_id']);
    }


}
