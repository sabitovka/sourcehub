<?php

namespace app\controllers;

use app\models\Category;
use app\models\Project;
use app\models\ProjectSearch;
use yii\web\Controller;

class CatalogController extends Controller
{

    public function actionIndex($q = '') {
        // $projects = Project::find()->all();
        $categories = Category::find()->all();

        $projects = (new ProjectSearch())->getSearchResult($q);

        return $this->render('index', ['projects' => $projects, 'categories' => $categories]);
    }
}
