<?php use yii\helpers\Html; ?>

<div class="card shadow" style="height: 100%">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Enquiries</div>
            <div class="col text-right">
                <?= Html::a('See All', ['site/enquiries'], ['class' => 'btn btn-sm btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Property Type</th>
                <th scope="col">Bedrooms</th>
                <th scope="col">Furnishing Status</th>
                <th scope="col">Rent Expectation</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $i): ?>
                <tr <?= ($i->seen) ? '' : 'class="bg-gradient-lighter"' ?>>
                    <td><?= $i->id ?></td>
                    <td><?= $i->user->username ?></td>
                    <td><?= $i->location ?></td>
                    <td><?= $i->status->status_title ?></td>
                    <td><?= $i->propertyType->name ?></td>
                    <td><?= $i->bedrooms ?></td>
                    <td><?= $i->furnishing_status ?></td>
                    <td><?= $i->rent_expectation ?></td>

                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                               data-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <?= Html::a('View', ["appointment/view", 'id' => $i->id], ['class' => 'dropdown-item']) ?>
                                <?= Html::a('Update', ["appointment/update", 'id' => $i->id], ['class' => 'dropdown-item']) ?>
                                <?= Html::a('Delete', ["appointment/delete", 'id' => $i->id], ['class' => 'dropdown-item', 'data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'POST']) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
