<?php

use app\assets\AppAsset;
use app\assets\ChartJsAssetBundle;
use phpnt\chartJS\ChartJs;

ChartJsAssetBundle::register($this);
AppAsset::register($this);
?>

<div class="p-4">
    <h5>Количество загрузок файлов проекта</h5>
    <?= ChartJs::widget([
        'type' => ChartJs::TYPE_LINE,
        'data' => [ 
            'labels' => $data['labels'],
            'datasets' => [
                [
                    'data' => $data['views'],
                    'label' => 'Количество загрузок',
                ],
            ],
            ],
        ]
    ); ?>

</div>