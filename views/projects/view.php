<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="align-items-center">
    <?= $this->render('_header', ['model' => $model]) ?>

    <div class="d-flex align-items-center mt-3">
        <?= Html::a('Загрузить', Url::to(['files', 'u' => $model->urlname]), ['class' => 'btn btn-success col-2']) ?>
        <div class="fw-bold fs-5 col text-end"><span><?= $model->getDownloadsCount() ?></span> Загрузок</div>
        <div class="fw-bold fs-5 col text-end">Последнее обновлениие: <span><?= $model->getLastUpdatedDate() ?></span></div>
    </div>

    <div class="card text-center my-3">
        <?= $this->render('_tab-header', [
            'activeTab' => 'view',
            'model' => $model,
        ]) ?>

        <div class="card-body text-start px-3">
            <div class="fs-5 fw-bolder">
                Платформа:
                <span class="link-primary">
                    <?= implode(', ', (array_map(function ($array) { return $array['name']; }, $model->getPlatforms()->all()))) ?>
                </span>
            </div>
            <div class="fs-5 fw-bolder">
                Категории:
                <span class="link-primary">
                <?= implode(', ', (array_map(function ($array) {
                    return $array['name'];
                }, $model->getCategories()->all()))) ?>
                </span>
            </div>
            <div class="fs-5 fw-bolder">Сайт проекта: <span class="link-primary">urlspce.io</span></div>
            <div class="fs-5 fw-bolder">Лицензия: <span class="link-primary"><?= $model->license->name ?></span></div>
            <div class="mt-3"><p class="fw-normal"><?= $model->description ?></p></div>

            <div class="my-3 d-flex align-items-center">
                <button class="btn btn-outline-secondary">&lt;</button>
                <div class="d-flex mx-3 overflow-hidden">
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                    <a href="#"><img width="300" height="200" class="mx-2"></a>
                </div>
                <button class="btn btn-outline-secondary">&gt;</button>
            </div>
        </div>
    </div>

    <div class="mt-4">
            <div class="align-items-center d-flex">
                <h4 class="col">Комментарии</h4>
                <?= Html::a('Смотреть больше', Url::to(['comments', 'u' => $model->urlname]), ['class' => 'col text-end']) ?>
            </div>
            <div class="card mt-2 px-2">
                <div class="mt-4">
                    <?= ListView::widget([
                        'dataProvider' => $commentsProvider,
                        'itemView' => '_comment',
                    ]); ?>
                </div>
            </div>
        </div>

</div>
