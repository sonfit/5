<?php

use yii\db\Migration;

/**
 * Class m210311_022811_Categories
 */
class m210311_022811_Categories extends Migration
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

        $this->createTable('{{%tbl_categories}}', [
            'cate_id' => $this->primaryKey(),
            'cate_name' => $this->string()->notNull()->unique(),
            'cate_slug' => $this->string()->notNull()->unique(),
            'cate_parent' => $this->string()->notNull(),
            'cate_desc' => $this->string(),
            'cate_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_categories}}');
    }
}
