<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/** @var app\models\Project $projects */
/** @var app\models\Category $categories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог'];
\yii\web\YiiAsset::register($this);
?>

<h2>Найти свободное ПО</h2>

<div class="row mt-4">
    <div class="col">
        <form action="catalog">
            <div class="input-group mb-3">
                <input name="q" class="form-control" type="text" placeholder="Найти" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit">Найти</button>
            </div>
        </form>
    </div>
    <div class="col-4">
        <div class="input-group">
            <label class="input-group-text" for="inputGroupSelect01">Сортировка</label>
            <select class="form-select" id="inputGroupSelect01">
                <option selected>Выберите...</option>
                <option value="1">По наименованию (возр.)</option>
                <option value="2">По наименованию (уб.)</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="card p-3">
            <div>Категории</div>
            <?php
                foreach ($categories as $category) {
                    echo Html::a($category['name']);
                }
            ?>
        </div>
    </div>
    <div class="col">
        <div class="card p-3">
            <?= !$projects ? '<h5 class="text-center">Ничего не нашлось</h5>' : '' ?>
            <?php foreach($projects as $project) { ?>
                <div class="mt-2 d-flex flex-column">
                    <div class="d-flex">
                        <img src="" alt="" width="100" height="100">
                        <div class="ms-2">
                            <h5><?= $project['name'] ?></h5>
                            <div><?= $project['short_description'] ?></div>
                        </div>
                    </div>
                    <button class="btn btn-primary ms-auto">
                        <?= Html::a('Подробнее', Url::to(
                                ['projects/view', 'u' => $project['urlname']]),
                                ['class' => 'text-decoration-none text-reset px-3 py-2']
                            )
                        ?>
                    </button>
                    <div class="border-bottom mt-2"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>