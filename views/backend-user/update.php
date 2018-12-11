<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */

$this->title = 'Update Backend User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Backend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'username' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="backend-user-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
