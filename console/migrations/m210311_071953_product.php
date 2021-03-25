<?php

use yii\db\Migration;

/**
 * Class m210311_071953_product
 */
class m210311_071953_product extends Migration
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

        $this->createTable('{{%tbl_product}}', [
            'prod_id' => $this->primaryKey(),
            'cate_id' => $this->integer()->notNull(),
            'prod_name' => $this->string()->notNull()->unique(),
            'prod_slug' => $this->string()->notNull()->unique(),
            'prod_image' => $this->string()->notNull(),
            'prod_content' => $this->text()->notNull(),
            'prod_desc' => $this->string()->notNull(),
            'prod_price' => $this->integer()->defaultValue(0),
            'prod_qty' => $this->integer()->defaultValue(0),
            'prod_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_product}}');
    }
}
