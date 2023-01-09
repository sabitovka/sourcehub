<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\widgets\ListView;

?>
<main class="container">
    <section>
        <h1 class="my-5 text-center">Веб-ориентированная информационно-поисковая система свободного программного обеспечения</h1>
        <form action="#" method="post" class="search my-5 d-flex justify-content-md-center">
            <div class="form-group col-5">
                <input type="email" class="form-control" id="sh-search" placeholder="Поиск">
            </div>
        </form>
    </section>
    <article class="d-flex justify-content-around text-center my-5">
        <div class="px-5 w-100">
            <h4>Прямиком от разработчиков</h4>
            <div>SoufceHub - ресурс сообщества с открытым исходным кодом, предназначенный для того, чтобы помочь проектам с открытым исходным кодом быть максимально успешными.</div>
            <button class="btn btn-outline-success mt-2"><?= Html::a('Каталог', 'catalog', ['class' => 'text-decoration-none text-reset']) ?></button>
        </div>
        <div class="px-5 w-100">
            <h4>Оживи свой проект</h4>
            <div>Наш популярный каталог объединяет почти 30 миллионов посетителей и обслуживает более 2,6 миллионов</div>
            <button class="btn btn-outline-success mt-2"><?= Html::a('Создать', 'projects/create', ['class' => 'text-decoration-none text-reset']) ?></button>
        </div>
    </article>

    <section class="mt-5">
        <h5>Популярные программы</h5>
        <?= ListView::widget([
            'dataProvider' => $topDownloadedAP,
            'itemView' => '_top-downloaded',
        ]); ?>
    </section>
</main>
