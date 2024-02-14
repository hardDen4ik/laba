<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addition}}`.
 */
class m240209_140547_create_addition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%addition}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%addition}}');
    }
}
