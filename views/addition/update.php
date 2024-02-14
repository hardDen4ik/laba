<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Addition $model */

$this->title = 'Update Addition: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Additions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="addition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
