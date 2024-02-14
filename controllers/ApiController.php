<?php

namespace app\controllers;

use app\models\Addition;
use app\models\Category;
use app\models\Game;
use yii\web\Controller;

class ApiController extends Controller
{
    public function actionGames()
    {
        $games = Game::find()->all();

        return $this->asJson($games);
    }

    public function actionCategories()
    {
        $categories = Category::find()->all();

        return $this->asJson($categories);
    }

    public function actionAdditions()
    {
        $additions = Addition::find()->all();

        return $this->asJson($additions);
    }

    public function actionGame($id)
    {
        $game = Game::findOne($id);

        return $this->asJson($game);
    }

    public function actionCategory($id)
    {
        $category = Category::findOne($id);

        return $this->asJson($category);
    }
}
