<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Game $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="game-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'rules:ntext',
            [
                'attribute' => 'photo',
                'value' => '@web/' . $model->photo,
                'format' => ['image',['width'=>'100','height'=>'100']],
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
