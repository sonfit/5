<?php

use yii\db\Migration;

/**
 * Class m210318_091505_tbl_deliver
 */
class m210318_091505_tbl_deliver extends Migration
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

        $this->createTable('{{%tbl_deliver}}', [
            'deliver_id' => $this->primaryKey(),
            'deliver_name' => $this->string()->notNull(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_deliver}}');
    }
}
