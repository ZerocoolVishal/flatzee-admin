<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agents';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="agents-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Add Agent', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= $this->render('_agents_table', ['data' => $dataProvider->getModels()]) ?>
    </div>
</div>
