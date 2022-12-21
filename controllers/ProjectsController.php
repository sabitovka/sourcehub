<?php

namespace app\controllers;

use app\models\Category;
use app\models\File;
use app\models\License;
use app\models\Platform;
use app\models\Project;
use app\models\UploadForm;
use app\models\UploadLogoForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
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

    private function _actionSettingsCategories($model) {
        $action = 'categories';

        $categoriesProvider = new ActiveDataProvider([
            'query' => $model->getCategories(),
        ]);
        $allCategories = Category::find()->asArray()->all();

        if ($this->request->isPost) {
            $data = $this->request->post();
            if ($data['category'] > 0) {
                $category = Category::findOne(['id' => $data['category']]);
                $model->link('categories', $category);
                return $this->redirect(Url::to(['projects/settings', 'u' => $model->urlname, 'action' => $action]));
            } else {
                return json_encode(['error' => true, 'message' => 'Не выбрана категория'], JSON_UNESCAPED_UNICODE);
            }
        }

        return $this->render('settings', [
            'model' => $model,
            'categoriesProvider' => $categoriesProvider,
            'categories' => ArrayHelper::map($allCategories, 'id', 'name'),
            'action' => $action,
        ]);
    }

    public function _actionSettingsPlatforms($model) {
        $action = 'platforms';

        $platformsProvider = new ActiveDataProvider([
            'query' => $model->getPlatforms(),
        ]);
        $platforms = Platform::find()->asArray()->all();

        if ($this->request->isPost) {
            $data = $this->request->post();
            if ($data['platform'] > 0) {
                $platform = Platform::findOne(['id' => $data['platform']]);
                $model->link('platforms', $platform);
                return $this->redirect(Url::to(['projects/settings', 'u' => $model->urlname, 'action' => $action]));
            } else {
                return json_encode(['error' => true, 'message' => 'Не выбрана категория'], JSON_UNESCAPED_UNICODE);
            }
        }

        return $this->render('settings', [
            'model' => $model,
            'platformsProvider' => $platformsProvider,
            'platforms' => ArrayHelper::map($platforms, 'id', 'name'),
            'action' => $action,
        ]);
    }

    public function actionSettings($u, $action = 'index') {
        $model = Project::findOne(['urlname' => $u]);
        switch ($action) {
            case 'index':
                return $this->_actionSettingsIndex($model);
            case 'files':
                return $this->_actionSettingsFiles($model);
            case 'categories':
                return $this->_actionSettingsCategories($model);
            case 'platforms':
                return $this->_actionSettingsPlatforms($model);
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

    private function getFilesStatistics($model) {
        $sql = "SELECT 
            DATE(NOW() - INTERVAL l.day DAY) AS day,
            COALESCE(d.`count`, 0) AS views
        FROM last_days AS l
        LEFT JOIN (SELECT
                DATE(DATE_FORMAT(downloaded_at, '%Y-%m-%d')) AS df,
                COUNT(id) as `count`
            FROM `downloads`
            WHERE file_id = :fileid
            GROUP BY df) as d
        ON DATE(NOW() - INTERVAL l.day DAY) = d.df
        group BY DATE(NOW() - INTERVAL l.day DAY)
        ORDER BY `day` DESC;";

        $files = $model->getFiles()->all();
        $data = [];
        foreach ($files as $file) {
            $rawdata = Yii::$app->db
                ->createCommand($sql)
                ->bindParam(':fileid', $file->id)
                ->queryAll();
            $data['labels'] = ArrayHelper::getColumn($rawdata, 'day');
            $data['views'][] = ['data' => ArrayHelper::getColumn($rawdata, 'views')];
        }

        return $data;
    }

    public function actionFiles($u) {
        $model = Project::findOne(['urlname' => $u]);
        $params = [];

        if (Yii::$app->user->isGuest) {
            $dataProvider = new ActiveDataProvider([
                'query' => File::find()->where(['project_id' => $model->id]),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            $params = [
                'dataProvider' => $dataProvider
            ];
        } else {
            $data = $this->getFilesStatistics($model);

            $params = [
                'data' => $data
            ];
        }
        
        return $this->render('files', [
            'model' => $model,
        ] + $params);
    }

    public function actionComments($u) {
        $model = Project::findOne(['urlname' => $u]);

        return $this->render('comments', ['model' => $model]);
    }

    public function actionCountTest($u) {
        $model = Project::getAllProjectsDownloads()->limit(20)->all();
        // return $file->getDownloadsCount('2022-12-09 00:00:00', '2022-12-09 23:59:59');
        return json_encode($model);
    }
}
