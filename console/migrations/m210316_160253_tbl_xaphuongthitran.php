<?php

use yii\db\Migration;

/**
 * Class m210316_160253_tbl_xaphuongthitran
 */
class m210316_160253_tbl_xaphuongthitran extends Migration
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

        $this->createTable('{{%tbl_xaphuongthitran}}', [
            'xaid' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type' => $this->string()->notNull(),
            'maqh' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_xaphuongthitran}}');
    }
}
