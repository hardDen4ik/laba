<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Game $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="game-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rules')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_gamers')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'max_gamers')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'), ['prompt' => 'Select category']) ?>

    <?= $form->field($model, 'additions')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Addition::find()->all(), 'id', 'name'), ['prompt' => 'Select additions', 'multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
