<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'Create Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="appointment-create card shadow p-5 mt-5">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
