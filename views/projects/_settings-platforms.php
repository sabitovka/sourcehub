<?php

use yii\bootstrap5\Modal;
use yii\grid\GridView;
?>

<div class="col">
    <h3>Платформы</h3>

    <?php
    Modal::begin([
        'title' => '<h4>Выберите платформу</h4>',
        'toggleButton' => [
            'label' => 'Добавить',
            'class' => 'btn btn-success my-2',
        ],
    ]); ?>

    <form id="new-platform" method="POST">
        <select class="form-select mb-3" id="platform" name="platform">
            <option selected value="-1" disabled>Выберите платформу</option>
            <?php foreach ($platforms as $cId => $cName) {?>
            <?= "<option value='$cId'>$cName</option>" ?>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

    <?php Modal::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $platformsProvider,
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

    $('form#new-platform').on('submit', (e) => {
        e.preventDefault();
        const select = $('#platform');
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