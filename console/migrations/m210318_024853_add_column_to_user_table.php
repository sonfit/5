<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m210318_024853_add_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'phone', $this->string()->unique());
        $this->addColumn('{{%user}}', 'province', $this->string());
        $this->addColumn('{{%user}}', 'dictrict', $this->string());
        $this->addColumn('{{%user}}', 'ward', $this->string());
        $this->addColumn('{{%user}}', 'add', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'position');
    }
}

