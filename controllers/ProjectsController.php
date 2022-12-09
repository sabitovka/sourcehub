<?php

namespace app\controllers;

use app\models\File;
use app\models\License;
use app\models\Project;
use app\models\UploadForm;
use app\models\UploadLogoForm;
use DateTime;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
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
                    mkdir('upload/projects/' . $model->urlname . '/files');
                }
                return $this->redirect(['view', 'u' => $model->urlname]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', ['model' => $model]);
    }

    private function _actionSettingsIndex($model) {
        $action = 'index';

        $licenses = License::find()->all();
        $licenseItems = ArrayHelper::map($licenses, 'id', 'name');
        $logoForm = new UploadLogoForm($model->urlname);

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

    private function _actionSettingsFiles($model) {
        $action = 'files';

        $dataProvider = new ActiveDataProvider([
            'query' => File::find()->where(['project_id' => $model->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $files = (new File())->getFilesByProjectId($model->id);
        $uploadForm = new UploadForm();

        if ($this->request->isPost) {
            $uploadForm->file = UploadedFile::getInstance($uploadForm, 'file');

            if ($uploadForm->file && $uploadForm->validate()) {
                $path = 'upload/projects/' . $model->urlname . '/files//' . $uploadForm->file->baseName . '.' . $uploadForm->file->extension;
                $saved = $uploadForm->file->saveAs($path);
                if ($saved) {
                    $newFile = new File();
                    $newFile->filename = $path;
                    $newFile->name = $uploadForm->file->name;
                    $newFile->project_id = $model->id;
                    $newFile->upload_at = new Expression('NOW()');
                    $newFile->save();
                }
            }
        }

        return $this->render('settings', [
            'model' => $model,
            'files' => $files,
            'uploadForm' => $uploadForm,
            'action' => $action,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSettings($u, $action = 'index') {
        $model = Project::findOne(['urlname' => $u]);
        switch ($action) {
            case 'index':
                return $this->_actionSettingsIndex($model);
            case 'files':
                return $this->_actionSettingsFiles($model);
            default:
                return $this->actionIndex();
        }
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
        $dataProvider = new ActiveDataProvider([
            'query' => File::find()->where(['project_id' => $model->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);


        return $this->render('files', ['model' => $model, 'dataProvider' => $dataProvider]);
    }

    public function actionComments($u) {
        $model = Project::findOne(['urlname' => $u]);

        return $this->render('comments', ['model' => $model]);
    }
}
