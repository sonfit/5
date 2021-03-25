<?php

use yii\db\Migration;

/**
 * Class m210318_152549_tbl_order_detail
 */
class m210318_152549_tbl_order_detail extends Migration
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

        $this->createTable('{{%tbl_order_detail}}', [
            'order_detail_id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'pro_id' => $this->integer()->notNull(),
            'pro_price' => $this->integer()->notNull(),
            'pro_qty' => $this->integer()->notNull(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_order_detail}}');
    }
}
