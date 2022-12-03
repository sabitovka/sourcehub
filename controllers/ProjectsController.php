<?php

namespace app\controllers;

use yii\web\Controller;

class ProjectsController extends Controller
{
    public function actionView($urlname)
    {
        return $this->render('view', []);
    }
}
