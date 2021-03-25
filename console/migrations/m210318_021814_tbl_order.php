<?php

use yii\db\Migration;

/**
 * Class m210318_021814_tbl_order
 */
class m210318_021814_tbl_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tbl_order}}', [
            'order_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'user_ship' => $this->string()->notNull(),
            'email_ship' => $this->string()->notNull(),
            'phone_ship' => $this->string()->notNull(),
            'add_ship' => $this->string()->notNull(),
            'province_ship' => $this->string()->notNull(),
            'dictrict_ship' => $this->string()->notNull(),
            'ward_ship' => $this->string()->notNull(),
            'resquest' => $this->string()->notNull(),
            'total' => $this->integer()->notNull(),
            'payment_id' => $this->integer()->notNull(),
            'deliver_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_order}}');
    }
}
