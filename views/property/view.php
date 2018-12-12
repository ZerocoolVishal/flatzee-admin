<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Property */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="property-view card shadow p-5 mt-5">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id, 'slug' => $model->slug], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id, 'slug' => $model->slug], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'slug',
                'negotiable',
                'price',
                'bathroom',
                'balconies',
                'society',
                'super_area',
                'build_up_area',
                'carpet_area',
                'furnished_status',
                'car_parking',
                'floor',
                'total_floor',
                'facing',
                'description',
                'monthly_maintenance',
                'security_deposit',
                'location',
                'landmarks',
                'age_of_construction',
                'available_since',
                'available_to',
                'type',
                'current_status',
                'date_added',
            ],
        ]) ?>

        <div class="mt-4">
            <table class="table table-striped table-bordered detail-view">
                <?php
                $i = 1;
                foreach ($model->bedrooms as $bedroom) {
                    echo "<tr>";
                    echo "<td><b>Bedroom: $i</b></td>";
                    foreach ($bedroom->bedroomAmenities as $amenity) {
                        echo "<td>".$amenity->amenityIr->name." ".$amenity->amenityIr->icon."</td>";
                    }
                    echo "</tr>";
                    $i++;
                }?>
            </table>
        </div>

    </div>
</div>

