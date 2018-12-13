<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 13/12/18
 * Time: 6:05 PM
 */

use yii\widgets\ActiveForm;

?>

<div class="container-fluid">

    <div class="card shadow mt-5 p-5">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <button class="btn btn-primary">Upload</button>

        <?php ActiveForm::end() ?>
    </div>

</div>
