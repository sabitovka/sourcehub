<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\Platform $model */


\yii\web\YiiAsset::register($this);
?>

<h3>Создать проект</h3>

<?php $form = ActiveForm::begin([
    'id' => 'new-project-form'
]); ?>

<?= $form->field($model, 'name')->input('text') ?>
<?= $form->field($model, 'urlname')->input('text') ?>

<div class="form-group">
    <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>