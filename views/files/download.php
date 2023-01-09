<?
use yii\bootstrap5\Html;
?>
<h4><?= $file ? 'Загрузка файла ' . $file->name : 'Файл не найден' ?></h4>
<?= Html::a('Назад в каталог', ['/catalog'], ['class' => 'btn btn-success mt-3']);