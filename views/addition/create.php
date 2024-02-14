<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Addition $model */

$this->title = 'Create Addition';
$this->params['breadcrumbs'][] = ['label' => 'Additions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
