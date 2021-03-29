<?php

use yii\db\Migration;

/**
 * Class m210326_015535_tbl_homepages
 */
class m210326_015535_tbl_homepages extends Migration
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

        $this->createTable('{{%tbl_homepages}}', [
            'home_id' => $this->primaryKey(),
            'home_key' => $this->string()->notNull(),
            'home_value' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_homepages}}');
    }
}
