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

    <div class="d-flex align-items-center mt-3">
        <button class="btn btn-success col-2">Загрузить</button>
        <div class="fw-bold fs-5 col text-end"><span>25</span> Загрузок</div>
        <div class="fw-bold fs-5 col text-end">Последнее обновлениие: <span>25.11.2022</span></div>
    </div>

    <div class="card text-center my-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Общее</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Файлы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Комментарии</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Настройка</a>
                </li>
            </ul>   
        </div>

        <div class="card-body text-start px-3">
            <div class="fs-5 fw-bolder">Платформа: <span class="link-primary"><?= $model->platform->name ?></span></div>
            <div class="fs-5 fw-bolder">Категории: <span class="link-primary"><?= $model->category->name ?></span></div>
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
