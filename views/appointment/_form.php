<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Property;
use app\models\Agents;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput([
            'type' => 'date',
            'data-date-format' => 'yyyy-mm-dd',
            'data-provide' => 'datepicker'
    ]) ?>

    <?= $form->field($model, 'time')->textInput([
            'type' => 'time'
    ]) ?>

    <?= $form->field($model, 'property_id')->dropDownList(ArrayHelper::map(Property::find()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'status')->dropDownList([
            'Open',
            'Visited',
            'Close',
            'Cancelled',
            'Rented'
    ]) ?>

    <?= $form->field($model, 'users_is')->dropDownList(ArrayHelper::map(Users::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'agent_id')->dropDownList(ArrayHelper::map(Agents::find()->all(), 'id', 'username')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
