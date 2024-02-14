<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addition".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property AdditionGame[] $additionGames
 */
class Addition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[AdditionGames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdditionGames()
    {
        return $this->hasMany(AdditionGame::class, ['addition_id' => 'id']);
    }
}
