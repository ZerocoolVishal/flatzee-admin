<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'slug',
            'negotiable',
            'price',
            //'bathroom',
            //'balconies',
            //'society',
            //'super_area',
            //'build_up_area',
            //'carpet_area',
            //'furnished_status',
            //'car_parking',
            //'floor',
            //'total_floor',
            //'facing',
            //'description',
            //'monthly_maintenance',
            //'security_deposit',
            //'location',
            //'landmarks',
            //'age_of_construction',
            //'available_since',
            //'available_to',
            //'type',
            //'current_status',
            //'date_added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
