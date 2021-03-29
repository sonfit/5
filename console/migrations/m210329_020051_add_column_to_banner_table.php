<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%banner}}`.
 */
class m210329_020051_add_column_to_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

          $this->addColumn('{{%tbl_banner}}', 'banner_image', $this->string();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tbl_banner}}', 'position');
    }
}
