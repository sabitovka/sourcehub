<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$ACTIONS = [
    'index' => 'Проект',
    'screenshots' => 'Скриншоты',
    'categories' => 'Категории',
    'platforms' => 'Платформы',
    'files' => 'Файлы'
]
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
                    <?php
                        foreach ($ACTIONS as $key => $value) {
                            echo Html::a(
                                $value,
                                ['settings', 'u' => $model->urlname, 'action' => $key],
                                ['class' => 'list-group-item list-group-item-action' . ($action == $key ? ' active' : '')]
                            );
                        }
                    ?>
                </div>
            </div>
            <?=  $this->render('_settings-'.$action, $_params_) ?>
        </div>
    </div>
</div>
