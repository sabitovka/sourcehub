<?php

use yii\bootstrap5\Html;
?>

<div class="d-flex col px-0">
    <?=
        Html::img(
            '@web/upload/projects/'.$model->urlname.'/logo',
            [
                'alt' => $model->urlname,
                'class' => 'img-responsive',
                'width' => 100,
                'height' => 100
            ]
        );
    ?>
    <div class="project-head__title ms-3">
        <h3 class="mb-0"><?= $this->title ?></h3>
        <div><?= $model->short_description ?></div>
        <div class="mt-3">Поделился с тобой: <span><a href="#" class="link-primary"><?= $model->user->username ?></a></span></div>
    </div>
</div>