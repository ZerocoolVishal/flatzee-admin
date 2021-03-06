<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backend Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="backend-user-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Add Backend User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= $this->render('_user_table', ['data' => $dataProvider->getModels()]) ?>
    </div>
</div>
