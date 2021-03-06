<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Property Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="property-status-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Property Status', ['create'], ['class' => 'btn btn-success']) ?>
        </p>


        <?= $this->render('_property_status_table', ['data' => $dataProvider->getModels()]) ?>
    </div>
</div>
