<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\License $model */

$this->title = 'Create License';
$this->params['breadcrumbs'][] = ['label' => 'Licenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="license-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
