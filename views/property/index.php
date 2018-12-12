<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="property-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= $this->render('_property_table', ['data' => $dataProvider->getModels()]) ?>
    </div>
</div>
