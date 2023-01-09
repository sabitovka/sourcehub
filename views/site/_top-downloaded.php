<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

?>
<div class="mt-2 d-flex flex-column">
    <div class="d-flex">
        <?php
            $logoimg = \Yii::getAlias('@webroot') . '/upload/projects/'.$model['urlname'].'/logo';
            $filename = file_exists($logoimg) ? '@web/upload/projects/'.$model['urlname'].'/logo' : '@web/img/noimage.jpg';
            echo Html::img(
                $filename,
                [
                    'alt' => $model['urlname'],
                    'class' => 'img-responsive',
                    'width' => 100,
                    'height' => 100
                ]
            );
        ?>
        <div class="ms-2">
            <h5><?= $model['name'] ?></h5>
            <div><?= $model['short_description'] ?></div>
        </div>
    </div>
    <button class="btn btn-primary ms-auto">
        <?= Html::a('Подробнее', Url::to(
                ['projects/view', 'u' => $model['urlname']]),
                ['class' => 'text-decoration-none text-reset px-3 py-2']
            )
        ?>
    </button>
    <div class="border-bottom mt-2"></div>
</div>
