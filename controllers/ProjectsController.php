<?php

namespace app\controllers;

use app\models\Project;
use yii\web\Controller;
use yii\helpers\Url;

class ProjectsController extends Controller
{

    public function actionIndex() {
        return $this->redirect(Url::to(['/catalog']));
    }

    public function actionView($urlname) {
        $model = Project::findOne(['urlname' => $urlname]);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionCreate() {
        $model = new Project();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'urlname' => $model->urlname]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionSettings($urlname) {
        return 'olo';
    }
}
