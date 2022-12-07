<?php

namespace app\controllers;

use app\models\Category;
use app\models\Project;
use yii\web\Controller;

class CatalogController extends Controller
{

    public function actionIndex() {
        $projects = Project::find()->all();
        $categories = Category::find()->all();
        return $this->render('index', ['projects' => $projects, 'categories' => $categories]);
    }
}
