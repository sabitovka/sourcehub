<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="align-items-center">
    <div class="d-flex col px-0">
        <img width="100" height="100">
        <div class="project-head__title ms-3">
            <h3 class="mb-0">Название программы</h3>
            <div>Lorem ipsum dolor sit amet.</div>
            <div class="mt-3">Поделился с тобой: <span><a href="#" class="link-primary">sabitov</a></span></div>
        </div>
    </div>
</div>
