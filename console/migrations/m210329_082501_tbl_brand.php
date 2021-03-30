<?php

use yii\db\Migration;

/**
 * Class m210329_082501_tbl_brand
 */
class m210329_082501_tbl_brand extends Migration
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

        $this->createTable('{{%tbl_brand}}', [
            'brand_id' => $this->primaryKey(),
            'brand_name' => $this->string()->notNull()->unique(),
            'brand_slug' => $this->string()->notNull()->unique(),
            'brand_desc' => $this->string(),
            'brand_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_brand}}');
    }
}
