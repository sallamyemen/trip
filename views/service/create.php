<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var app\models\Service $model */
/** @var app\models\User[] $users */
/** @var app\models\ServiceType[] $types */

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'service_type_id')->dropDownList(
    \yii\helpers\ArrayHelper::map($types, 'id', 'name'),
    ['prompt' => 'Выберите тип услуги']
) ?>
<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'start_date')->input('date') ?>
<?= $form->field($model, 'end_date')->input('date') ?>

<label>Участники услуги</label>
<?php foreach ($users as $user): ?>
    <div>
        <label>
            <input type="checkbox" name="users[]" value="<?= $user->id ?>"> <?= Html::encode($user->name) ?>
        </label>
    </div>
<?php endforeach; ?>

<div class="form-group mt-3">
    <?= Html::submitButton('Добавить услугу', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
