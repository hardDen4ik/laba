<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Game $model */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="game-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'rules:ntext',
            [
                'attribute' => 'photo',
                'value' => '@web/' . $model->photo,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            'time',
            'min_gamers',
            'max_gamers',
            [
                'attribute' => 'category',
                'value' => $model->category->name,
            ],
            [
                'attribute' => 'additions',
                'value' => function ($model) {
                    $res = '';
                    foreach ($model->additions as $addition) {
                        $res .= $addition->name. ',';
                    }
                    return $res;
                }
            ]
        ],
    ]) ?>

</div>
