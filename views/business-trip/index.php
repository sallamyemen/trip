<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Командировки';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::a('Создать командировку', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'title',
        'created_at',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
        ],
    ],
]) ?>
