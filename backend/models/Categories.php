<?php

namespace backend\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "tbl_categories".
 *
 * @property int $cate_id
 * @property string $cate_name
 * @property string $cate_slug
 * @property string $cate_parent
 * @property string|null $cate_desc
 * @property int $cate_status
 * @property int $created_at
 * @property int $updated_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $_cats = [];
    public static function tableName()
    {
        return 'tbl_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_name', 'cate_slug', 'created_at', 'updated_at'], 'required'],
            [['cate_status', 'created_at', 'updated_at'], 'integer'],
            [['cate_name', 'cate_slug', 'cate_parent', 'cate_desc'], 'string', 'max' => 255],
            [['cate_name'], 'unique'],
            [['cate_slug'], 'unique'],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => 'Cate ID',
            'cate_name' => 'Tên danh mục',
            'cate_slug' => 'Cate Slug',
            'cate_parent' => 'Danh mục Cha',
            'cate_desc' => 'Mô tả',
            'cate_status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getParent($parent=0,$string =''){
        $data = Categories::find()->where(['cate_parent'=>$parent])->all();
        if($data){
            foreach ($data as $item){
                if($item->cate_parent != 0){
                    $string .= '|-- ';
                }
                $this->_cats[$item->cate_id] = $string.$item->cate_name;
                $this->getParent($item->cate_id,$string);
            }
        }
        return $this->_cats;
    }
}
