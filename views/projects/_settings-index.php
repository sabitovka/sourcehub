<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>

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
        <div class="text-start">Логотип проекта</div>
        <!-- <img src="" alt="" width="100" height="100"> -->
        <?php
            $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data',],
                'action' => ['settings-upload-logo'],
            ]) ?>
        
        <?= $form->field($logoFile, 'file')->fileInput() ?>
        <?= $form->field($logoFile, 'urlname', ['enableLabel' => false])->textInput(['class' => 'd-none']); ?>
        <button class="btn btn-outline-success mt-2">Загрузить</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>