<?php

namespace app\controllers;

use app\models\License;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\Url;

class ProjectsController extends Controller
{

    public function actionIndex() {
        return $this->redirect(Url::to(['/catalog']));
    }

    public function actionView($u) {
        $model = Project::findOne(['urlname' => $u]);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionCreate() {
        $model = new Project();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'u' => $model->urlname]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionSettings($u, $action = 'index') {
        $model = Project::findOne(['urlname' => $u]);
        $licenses = License::find()->all();
        $licenseItems = ArrayHelper::map($licenses, 'id', 'name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['settings', 'u' => $model->urlname, 'action' => $action]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('settings', [
            'model' => $model,
            'licenseItems' => $licenseItems,
            'action' => $action
        ]);
    }
}
