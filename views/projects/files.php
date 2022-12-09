<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="align-items-center">
    <?= $this->render('_header', ['model' => $model]) ?>

    <div class="card text-center my-3">
        <?= $this->render('_tab-header', [
            'activeTab' => 'files',
            'model' => $model,
        ]) ?>


        <h3 class="text-start px-4 pt-4">Файлы</h3>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'text-start px-4'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'name',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'upload_at',
                    'format' => ['datetime', 'php:d.m.Y H:s']
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => "{download}",
                    'buttons' => [
                        'download' => function ($url) {
                            return Html::a('Загрузить', $url, [
                                'target' => '_blank',
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model) {
                        if ($action === 'download') {
                            return Url::to(['/files/download', 'id' => $model->id]);
                        }
                    }
                ],
            ],
        ]);
        ?>
    </div>

    <div class="mt-4">
            <div class="align-items-center d-flex">
                <h4 class="col">Комментарии</h4>
                <a href="#" class="col text-end">Смотреть больше</a>
            </div>
            <div class="card mt-2 px-2">
                <div class="col p-1 border-bottom">
                    <div class="row mt-2">
                        <div class="col fw-bolder fs-5">sabitov</div>
                        <div class="col text-end text-muted">Добавлено: 03.09.2022</div>
                    </div>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, explicabo suscipit soluta dolorum delectus atque? Molestiae vel dolore ad temporibus, quos ex similique fugiat voluptatem nobis repellat excepturi laudantium eius?
                    </p>
                </div>

                <div class="col p-1 border-bottom">
                    <div class="row mt-2">
                        <div class="col fw-bolder fs-5">sabitov</div>
                        <div class="col text-end text-muted">Добавлено: 03.09.2022</div>
                    </div>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, explicabo suscipit soluta dolorum delectus atque? Molestiae vel dolore ad temporibus, quos ex similique fugiat voluptatem nobis repellat excepturi laudantium eius?
                    </p>
                </div>

                <div class="col p-1">
                    <div class="row mt-2">
                        <div class="col fw-bolder fs-5">sabitov</div>
                        <div class="col text-end text-muted">Добавлено: 03.09.2022</div>
                    </div>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, explicabo suscipit soluta dolorum delectus atque? Molestiae vel dolore ad temporibus, quos ex similique fugiat voluptatem nobis repellat excepturi laudantium eius?
                    </p>
                </div>
            </div>
        </div>

</div>
