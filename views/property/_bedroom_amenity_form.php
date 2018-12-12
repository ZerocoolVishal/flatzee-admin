<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Amenities;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\BedroomAmenities */
/* @var $form ActiveForm */
?>
<div class="property-_bedroom_amenity_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'bedroom_id')->textInput(['readonly' => 'true']) ?>
        <?= $form->field($model, 'amenity_ir')->dropDownList(ArrayHelper::map(Amenities::find()->all(), 'id', 'name')) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- property-_bedroom_amenity_form -->
