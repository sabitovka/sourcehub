<?php

namespace app\controllers;

use app\models\Download;
use app\models\File;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use yii\helpers\Url;

class FilesController extends Controller
{

    public function actionIndex() {
        return $this->redirect(Url::to(['/catalog']));
    }

    public function actionDownload($id) {
        $file = File::find()->where(['id' => $id])->one();

        if ($file) {
            $path = $file->filename;
            if (file_exists($path)) {
                $download = new Download();
                $download->downloaded_at = new Expression('NOW()');
                $download->file_id = $id;
                $download->save();
                return Yii::$app->response->sendFile($path);
            }
        }

        throw new \yii\web\NotFoundHttpException("Файл {$file->name} не найден!");
    }

    public function actionCountTest($id) {
        $file = File::find()->where(['id' => $id])->one();
        // return $file->getDownloadsCount('2022-12-09 00:00:00', '2022-12-09 23:59:59');
        return $file->getDownloadsCount();
    }
}
