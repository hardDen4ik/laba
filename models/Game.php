<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $rules
 * @property string|null $photo
 * @property string|null $time
 * @property int|null $min_gamers
 * @property int|null $max_gamers
 * @property int|null $category_id
 *
 * @property AdditionGame[] $additionGames
 * @property Addition[] $additions
 * @property Category $category
 */
class Game extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rules', 'photo'], 'string'],
            [['min_gamers', 'max_gamers', 'category_id'], 'integer'],
            [['name', 'time'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['name', 'rules', 'category_id'], 'required']
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
            'rules' => 'Rules',
            'photo' => 'Photo',
            'time' => 'Time',
            'min_gamers' => 'Min Gamers',
            'max_gamers' => 'Max Gamers',
            'category_id' => 'Category ID',
        ];
    }

    public function fields()
    {
        return [
            'name',
            'rules',
            'photo',
            'time',
            'min_gamers',
            'max_gamers',
            'category' => function () {
                return $this->category->name;
            },
            'additions' => function () {
                $res = '';
                foreach ($this->additions as $addition) {
                    $res .= $addition->name. ',';
                }
                return $res;
            }
        ];

    }

    /**
     * Gets query for [[AdditionGames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdditionGames()
    {
        return $this->hasMany(AdditionGame::class, ['game_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Addition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdditions()
    {
        return $this->hasMany(Addition::class, ['id' => 'addition_id'])->via('additionGames');
    }

    public function upload()
    {
        $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
        $this->photo = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
    }

    public function unlinkAdditions()
    {
        foreach ($this->additions as $addition) {
            $this->unlink('additions', $addition);
        }
    }
}
