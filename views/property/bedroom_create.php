<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Property */

$this->title = 'Add Bedroom';
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Bedroom Amenity';
?>

<div class="container-fluid">

    <div class="property-create card shadow p-5 mt-5 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_bedroom_amenity_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
