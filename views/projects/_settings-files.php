<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\grid\GridView;
?>
<div class="col">
    <h3>Файлы</h3>
    <?php
        $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data',
                'class' => 'col-6',
            ],
        ]);
        echo $form->field($uploadForm, 'file')->fileInput();
        echo  Html::submitButton('Загрузить', ['class' => 'btn btn-secondary mb-2']);
        ActiveForm::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'visibleButtons' => [
                    'update' => false,
                    'view' => false,
                ]
            ],
        ],
    ]); ?>
</div>