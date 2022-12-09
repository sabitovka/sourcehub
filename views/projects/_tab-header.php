<?php

use yii\bootstrap5\Html;

function isActiveTab($currentTab, $activeTab) {
    return ($activeTab == $currentTab ? ' active' : '');
}

$TABS = [
    'view' => ['Общее'],
    'files' => ['Файлы'],
    'comments' => ['Комментарии'],
    'settings' => ['Настройка', 'active' => Yii::$app->user->isGuest],
]

?>

<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        <?php 
            foreach ($TABS as $key => $value) {
                if (!$value['active']) {
                    echo Html::a($value[0], [$key, 'u' => $model->urlname], ['class' => 'nav-link' . isActiveTab($key, $activeTab)]);
                }
            }
        ?>
    </ul>   
</div>