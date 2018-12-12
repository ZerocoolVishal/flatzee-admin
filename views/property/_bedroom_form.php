<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BedroomAmenities */
/* @var $form ActiveForm */
?>

<div class="property-_bedroom_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'bedroom_id') ?>
        <?= $form->field($model, 'amenity_ir') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- property-_bedroom_form -->
