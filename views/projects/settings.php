<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="align-items-center">
    <?= $this->render('_header', ['model' => $model]) ?>

    <div class="card text-start my-3">
        <?= $this->render('_tab-header', [
            'activeTab' => 'settings',
            'model' => $model,
        ]) ?>

        <div class="row p-3">
            <div class="col-2">
                <div class="list-group my-2">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Проект
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Скриншоты</a>
                    <a href="#" class="list-group-item list-group-item-action">Категории</a>
                    <a href="#" class="list-group-item list-group-item-action">Файлы</a>
                </div>
            </div>
            <div class="col-6">
                <?php $form = ActiveForm::begin(['id' => 'project-form']); ?>
                    <?= $form->field($model, 'name')->input('text') ?>
                    <?= $form->field($model, 'urlname')->input('text') ?>
                    <?= $form->field($model, 'license_id')->dropDownList($licenseItems, ['prompt' => 'Выберите...']) ?>
                    <?= $form->field($model, 'short_description')->input('text') ?>
                    <?= $form->field($model, 'description')->textarea() ?>

                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col">
                <div class="float-end d-flex flex-column align-items-center">
                    <div>Логотип проекта</div>
                    <img src="" alt="" width="100" height="100">
                    <button class="btn btn-outline-success mt-2">Загрузить</button>
                </div>
            </div>
        </div>
    </div>
</div>
