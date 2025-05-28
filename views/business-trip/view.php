<?php
use yii\helpers\Html;

/** @var app\models\BusinessTrip $model */

$this->title = 'Командировка #' . $model->id;

$participants = $model->participantsWithDates;

?>

<h1><?= Html::encode($this->title) ?></h1>

<p><strong>Название:</strong> <?= Html::encode($model->title) ?></p>
<p><strong>Создана:</strong> <?= $model->created_at ?></p>

<h3>Участники командировки и их даты</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Дата начала</th>
        <th>Дата окончания</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($participants as $info): ?>
        <tr>
            <td><?= Html::encode($info['user']->name) ?></td>
            <td><?= $info['start_date'] ?? '—' ?></td>
            <td><?= $info['end_date'] ?? '—' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<h3>Услуги командировки</h3>

<p><?= Html::a('Добавить услугу', ['service/create', 'trip_id' => $model->id], ['class' => 'btn btn-primary']) ?></p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Тип</th>
        <th>Описание</th>
        <th>Дата начала</th>
        <th>Дата окончания</th>
        <th>Участники</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model->services as $service): ?>
        <tr>
            <td><?= Html::encode($service->serviceType->name) ?></td>
<!--            <td>--><?//= Html::encode($service->description) ?><!--</td>-->
            <td><?= $service->start_date ?></td>
            <td><?= $service->end_date ?></td>
            <td>
                <ul>
                    <?php foreach ($service->employees as $employee): ?>
                        <?= $employee->name ?>
                    <?php endforeach; ?>
                </ul>
            </td>
            <td>
                <?= $service->status === 'active' ? 'Оформлена' : 'Отменена' ?>
            </td>
            <td>
                <?php if ($service->status === 'active'): ?>
                    <?= Html::a('Отменить', ['service/cancel', 'id' => $service->id], ['class' => 'btn btn-warning btn-sm']) ?>
                <?php else: ?>
                    <?= Html::a('Оформить', ['service/confirm', 'id' => $service->id], ['class' => 'btn btn-success btn-sm']) ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
