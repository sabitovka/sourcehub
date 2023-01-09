<?php

/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="align-items-center">
    <?= $this->render('_header', ['model' => $model]) ?>

    <div class="card my-3">
        <?= $this->render('_tab-header', [
            'activeTab' => 'files',
            'model' => $model,
        ]) ?>


        <h3 class="text-start px-4 pt-4">Файлы</h3>

        <?= Yii::$app->user->isGuest ? $this->render('_files-guest', $_params_) : $this->render('_files-admin', $_params_) ?>
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
