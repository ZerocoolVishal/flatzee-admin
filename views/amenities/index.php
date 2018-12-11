<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Amenities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="amenities-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Amenities', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= $this->render('_amenities_table.php', ['data' => $dataProvider->getModels()]) ?>
    </div>
</div>
