<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\RegisterForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="container">
        <div class="row mt-5">
            <h2>Создать аккаунт SourceHub</h2>
        </div>
        <div class="row mt-2 card p-3 flex-row">
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => [
                    'class' => 'col'
                ],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                ],
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                

            <?php ActiveForm::end(); ?>

            <div class="col-5 ms-auto">
                <h4>Уже есть аккаунт?</h4>
                <div>Войди в систему с аккантом SourceHub</div>
                <?= Html::a('Войти в систему', Url::to('login'), ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>
    </div>
</div>
