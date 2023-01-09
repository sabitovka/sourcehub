<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Modal;
use yii\widgets\ListView;

/** @var app\models\Platform $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="align-items-center">
    <?= $this->render('_header', ['model' => $model]) ?>

    <div class="card my-3">
        <?= $this->render('_tab-header', [
            'activeTab' => 'comments',
            'model' => $model,
        ]) ?>

        <div class="p-4">
            <h3 class="text-start">Комментарии</h3>
            <?php
            Modal::begin([
                'title' => '<h4>Добавьте комментарий</h4>',
                'toggleButton' => [
                    'label' => 'Добавить комментарий',
                    'class' => 'btn btn-outline-success' . (Yii::$app->user->isGuest ? ' d-none' : ''),
                ],
            ]); ?>
            <form id="comment-form">
                <div class="mb-3">
                    <label for="commentTextArea" class="form-label">Ваш комментарий</label>
                    <textarea class="form-control" id="commentTextArea" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
            <?php Modal::end(); ?>
        </div>

        <div class="mt-4 px-2">
            <?= ListView::widget([
                'dataProvider' => $commentsProvider,
                'itemView' => '_comment',
            ]); ?>
        </div>
    </div>

</div>

<? $js = <<<JS
    $('form#comment-form').on('submit', (e) => {
        e.preventDefault();
        const textArea = $('#commentTextArea');
        $.ajax({
            type: 'POST',
            data: {
                procedure: 'append',
                'text': textArea.val()
            }
        });
    })
JS;

$this->registerJs($js, $this::POS_READY);