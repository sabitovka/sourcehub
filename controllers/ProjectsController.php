<?php

namespace app\controllers;

use app\models\Project;
use yii\web\Controller;

class ProjectsController extends Controller
{
    public function actionView($urlname)
    {
        $model = Project::findOne(['id' => 1]);
        return $this->render('view', [
            'model' => $model
        ]);
    }
}
