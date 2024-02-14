<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%game}}`.
 */
class m240209_133243_create_game_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%game}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'rules' => $this->text(),
            'photo' => $this->string(),
            'time' => $this->string(),
            'min_gamers' => $this->integer(),
            'max_gamers' => $this->integer(),
            'category_id' => $this->integer()
        ]);
        $this->createIndex('category_id_idx', 'game', 'category_id');
        $this->addForeignKey('category_id_frg', 'game', 'category_id', 'category', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('category_id_frg', 'game');
        $this->dropForeignKey('category_id_frg', 'game');

        $this->dropTable('{{%game}}');
    }
}
