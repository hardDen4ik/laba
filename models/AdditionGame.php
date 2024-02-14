<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addition_game".
 *
 * @property int $id
 * @property int|null $game_id
 * @property int|null $addition_id
 *
 * @property Addition $addition
 * @property Game $game
 */
class AdditionGame extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addition_game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_id', 'addition_id'], 'integer'],
            [['addition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Addition::class, 'targetAttribute' => ['addition_id' => 'id']],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::class, 'targetAttribute' => ['game_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'addition_id' => 'Addition ID',
        ];
    }

    /**
     * Gets query for [[Addition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddition()
    {
        return $this->hasOne(Addition::class, ['id' => 'addition_id']);
    }

    /**
     * Gets query for [[Game]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::class, ['id' => 'game_id']);
    }
}
