<?php

use yii\db\Migration;

/**
 * Class m210316_160241_tbl_quanhuyen
 */
class m210316_160241_tbl_quanhuyen extends Migration
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

        $this->createTable('{{%tbl_quanhuyen}}', [
            'maqh' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type' => $this->string()->notNull(),
            'matp' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_quanhuyen}}');
    }
}
