<?php use yii\helpers\Html; ?>

<div class="card shadow mb-7">
    <div class="card-header border-0">
        <h3 class="mb-0">Backend Users</h3>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Location</th>
                <th scope="col">Property Owner</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $i): ?>
                <tr>
                    <td><?= $i->id ?></td>
                    <td><?= $i->title ?></td>
                    <td><?= $i->price ?></td>
                    <td><?= $i->location ?></td>
                    <td>
                        <?= Html::a($i->propertyOwner->username, ['property-owner/view', 'id' => $i->propertyOwner->id]) ?>
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                               data-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <?= Html::a('View', ["view", 'id' => $i->id], ['class' => 'dropdown-item']) ?>
                                <?= Html::a('Update', ["update", 'id' => $i->id], ['class' => 'dropdown-item']) ?>
                                <?= Html::a('Delete', ["delete", 'id' => $i->id], ['class' => 'dropdown-item', 'data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'POST']) ?>
                                <?= Html::a('Upload Image', ["upload-image", 'id' => $i->id], ['class' => 'dropdown-item',]) ?>
                                <?php
                                $bedrooms = $i->bedrooms;
                                $i = 1;
                                foreach ($bedrooms as $bedroom) {
                                    echo Html::a("Bedroom $i", ["bedroom_amenity_form", 'bedroom_id' => $bedroom->id], ['class' => 'dropdown-item', 'data-method' => 'POST']);
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
