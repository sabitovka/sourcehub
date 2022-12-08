<?php

/** @var yii\web\View $this */
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
            'activeTab' => 'comments',
            'model' => $model,
        ]) ?>


        <h3 class="text-start p-4">Комментарии</h3>
        <div class="mt-4">
                <div class="col p-1 border-bottom">
                    <div class="mt-2">
                        <div class="col fw-bolder fs-5">sabitov</div>
                        <div class="col text-end text-muted">Добавлено: 03.09.2022</div>
                    </div>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, explicabo suscipit soluta dolorum delectus atque? Molestiae vel dolore ad temporibus, quos ex similique fugiat voluptatem nobis repellat excepturi laudantium eius?
                    </p>
                </div>

                <div class="col p-1 border-bottom">
                    <div class="mt-2">
                        <div class="col fw-bolder fs-5">sabitov</div>
                        <div class="col text-end text-muted">Добавлено: 03.09.2022</div>
                    </div>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, explicabo suscipit soluta dolorum delectus atque? Molestiae vel dolore ad temporibus, quos ex similique fugiat voluptatem nobis repellat excepturi laudantium eius?
                    </p>
                </div>

                <div class="col p-1">
                    <div class="mt-2">
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
