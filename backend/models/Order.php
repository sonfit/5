<?php

namespace backend\models;

use common\models\User;
use frontend\components\Cart;
use Yii;


/**
 * This is the model class for table "tbl_order".
 *
 * @property int $order_id
 * @property int $user_id
 * @property string $user_ship
 * @property string $email_ship
 * @property string $phone_ship
 * @property string $add_ship
 * @property string $province_ship
 * @property string $dictrict_ship
 * @property string $ward_ship
 * @property string $resquest
 * @property int $total
 * @property int $payment_id
 * @property int $deliver_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */


class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $_user = [];
    public $_detail = [];
    public static function tableName()
    {
        return 'tbl_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_ship', 'email_ship', 'phone_ship', 'add_ship', 'province_ship', 'dictrict_ship', 'ward_ship', 'total', 'payment_id', 'deliver_id', 'status', 'created_at', 'updated_at'], 'required','message' => '{attribute} không được để rỗng!'],
            [['user_id', 'total', 'payment_id', 'deliver_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['user_ship',  'email_ship', 'phone_ship', 'add_ship', 'province_ship', 'dictrict_ship', 'ward_ship', 'resquest'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'Tên người đặt',
            'user_ship' => 'Tên người nhận',
            'email_ship' => 'Email',
            'phone_ship' => 'Số điện thoại',
            'add_ship' => 'Địa chỉ',
            'province_ship' => 'Tỉnh/Thành phố',
            'dictrict_ship' => 'Quận/Huyện',
            'ward_ship' => 'Xã/Phường/Thị Trấn',
            'resquest' => 'Resquest',
            'total' => 'Tổng tiền',
            'payment_id' => 'Phương thức thanh toán',
            'deliver_id' => 'Phương thức vận chuyển',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }
    public function getProvince(){
        return $this->hasOne(Tinhthanhpho::className(),['matp'=>'province_ship']);
    }
    public function getDictrict(){
        return $this->hasOne(Quanhuyen::className(),['maqh'=>'dictrict_ship']);
    }
    public function getWard(){
        return $this->hasOne(Xaphuongthitran::className(),['xaid'=>'ward_ship']);
    }
    public function getUsername(){
        return $this->user->username;
    }
    public function getAdd(){
        return $this->add_ship.'-'.$this->ward->name.'-'.$this->dictrict->name.'-'.$this->province->name;
    }
    public function getPayment(){
        return $this->hasOne(Payment::className(),['pay_id'=>'payment_id']);
    }
    public function getPay(){
        return $this->payment->pay_name;
    }
    public function getDeliver(){
        return $this->hasOne(Deliver::className(),['deliver_id'=>'deliver_id']);
    }
    public function getDelive(){
        return $this->deliver->deliver_name;
    }
//    public function getOrderdetail(){
//        return $this->hasOne(OrderDetail::className(),['order_id'=>'order_id']);
//    }
//    public function getDetail(){
//        return $this->orderdetail->order_detail_id;
//    }
}
