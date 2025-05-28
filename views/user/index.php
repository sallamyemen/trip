<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Пользователи';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]) ?>
