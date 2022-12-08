<?php

namespace app\controllers;

use app\models\License;
use app\models\Project;
use app\models\UploadForm;
use app\models\UploadLogoForm;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\UploadedFile;

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
                if (!file_exists('upload/projects/' . $model->urlname)) {
                    mkdir('upload/projects/' . $model->urlname);   
                }
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
        $logoForm = new UploadLogoForm($u);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('settings', [
            'model' => $model,
            'licenseItems' => $licenseItems,
            'action' => $action,
            'logoFile' => $logoForm,
        ]);
    }

    public function actionSettingsUploadLogo() {
        $model = new UploadLogoForm(null);
        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {       
                if (!file_exists('upload/projects/' . $model->urlname)) {
                    mkdir('upload/projects/' . $model->urlname);   
                }
                $model->file->saveAs('upload/projects/' . $model->urlname . '/logo');
            }
        }

        return $this->redirect(['settings', 'u' => $model->urlname]);
    }

    public function actionFiles($u) {
        $model = Project::findOne(['urlname' => $u]);

        return $this->render('files', ['model' => $model]);
    }

    public function actionComments($u) {
        $model = Project::findOne(['urlname' => $u]);

        return $this->render('comments', ['model' => $model]);
    }
}
