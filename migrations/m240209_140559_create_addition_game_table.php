<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addition_game}}`.
 */
class m240209_140559_create_addition_game_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%addition_game}}', [
            'id' => $this->primaryKey(),
            'game_id' =>$this->integer(),
            'addition_id' =>$this->integer(),
        ]);
        $this->createIndex('game_id_idx', 'addition_game', 'game_id');
        $this->addForeignKey('game_id_frg', 'addition_game', 'game_id', 'game', 'id');
        $this->createIndex('addition_id_idx', 'addition_game', 'addition_id');
        $this->addForeignKey('addition_id_frg', 'addition_game', 'addition_id', 'addition', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('game_id_frg', 'addition_game');
        $this->dropIndex('game_id_idx', 'addition_game');
        $this->dropForeignKey('addition_id_frg', 'addition_game');
        $this->dropIndex('addition_id_idx', 'addition_game');
        $this->dropTable('{{%addition_game}}');
    }
}
