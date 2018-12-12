<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="appointment-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Book an Appointment', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= $this->render('_appointment_table', ['data' => $dataProvider->getModels()]) ?>

    </div>
</div>
