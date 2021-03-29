<?php

use yii\db\Migration;

/**
 * Class m210329_014348_tbl_banner
 */
class m210329_014348_tbl_banner extends Migration
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

        $this->createTable('{{%tbl_banner}}', [
            'banner_id' => $this->primaryKey(),
            'banner_title' => $this->string()->notNull(),
            'banner_des' => $this->string(),
            'banner_button_link' => $this->string(),
            'banner_button_text' => $this->string(),
            'banner_status' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_banner}}');
    }
}
