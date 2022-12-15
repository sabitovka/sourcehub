<?php

use yii\bootstrap5\Modal;
use yii\grid\GridView;
?>

<div class="col">
    <h3>Категории</h3>

    <?php
    Modal::begin([
        'title' => '<h4>Выберите категорию</h4>',
        'toggleButton' => [
            'label' => 'Добавить',
            'class' => 'btn btn-success my-2',
        ],
    ]); ?>

    <form id="new-category" method="POST">
        <select class="form-select mb-3" id="category" name="category">
            <option selected value="-1" disabled>Выберите категорию</option>
            <?php foreach ($categories as $cId => $cName) {?>
            <?= "<option value='$cId'>$cName</option>" ?>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

    <?php Modal::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $categoriesProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => false,
                    'view' => false,
                ]
            ],
        ]
    ]) ?>
</div>

<? $js = <<<JS
    function tryParse(str) {
    try {
        return JSON.parse(str);
    } catch (e) {
        return null;
    }
}    

    $('form#new-category').on('submit', (e) => {
        e.preventDefault();
        const select = $('#category');
        $.ajax({
            type: 'POST',
            data: {
                procedure: 'append',
                [select[0].id]: select.val()
            }
        });
    })
JS;

$this->registerJs($js, $this::POS_READY);

?>