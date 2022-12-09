<?php

use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\Url;

?>
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