<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Games';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if ($categories):
        foreach ($categories as $category):
            ?>
            <p><?= $category->name ?></p>
            <?php foreach ($category->games as $game): ?>
        <div>
            <a href="game?id=<?= $game->id ?>"><p><?= $game->name ?></p></a>
            <img src="<?= Yii::getAlias('@web') . '/' . $game->photo ?>" width="100" , height="100">
        </div>

        <?php endforeach; ?>
            <?= '<br>------------------------------------------------------------' ?>
            <?= '<br>------------------------------------------------------------' ?>

        <?php endforeach; ?>

    <?php
    else: echo 'Нет категорий';
    endif;
    ?>
</div>
