<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="container">
        <div class="row mt-5">
            <h2>Войти c аккаунтом SourceHub</h2>
            <h3>Присоединись к самому большому сообществу открытого ПО</h3>
        </div>
        <div class="row mt-2 card p-3 flex-row">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [
                    'class' => 'col'
                ],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                ],
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    // 'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>

                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                

            <?php ActiveForm::end(); ?>

            <div class="col-5 ms-auto">
                <h4>Нужен аккаунт?</h4>
                <div>Находи, создавай, публикуй программное обеспечение c открытым исходным кодом</div>
                <?= Html::a('Создать аккаунт', Url::to('register'), ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>
    </div>
</div>
