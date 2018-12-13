<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\PropertyStatus;
use \app\models\PropertyTypes;
use \app\models\PropertyOwner;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'property_owner_id')->dropDownList(ArrayHelper::map(PropertyOwner::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'negotiable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'no_of_bedrooms')->textInput() ?>

    <?= $form->field($model, 'bathroom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balconies')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'society')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'super_area')->textInput() ?>

    <?= $form->field($model, 'build_up_area')->textInput() ?>

    <?= $form->field($model, 'carpet_area')->textInput() ?>

    <?= $form->field($model, 'furnished_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_parking')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'total_floor')->textInput() ?>

    <?= $form->field($model, 'facing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'monthly_maintenance')->textInput() ?>

    <?= $form->field($model, 'security_deposit')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'landmarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age_of_construction')->textInput() ?>

    <?= $form->field($model, 'available_since')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_to')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(PropertyTypes::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'current_status')->dropDownList(ArrayHelper::map(PropertyStatus::find()->all(), 'id', 'status_title')) ?>

    <?= $form->field($model, 'date_added')->textInput([
            'type' => 'date',
            'data-date-format' => 'yyyy-mm-dd',
            'data-provide' => 'datepicker'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
