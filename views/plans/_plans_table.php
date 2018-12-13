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
                <th scope="col">Plan Name</th>
                <th scope="col">Plan Type</th>
                <th scope="col">commission</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $i): ?>
                <tr>
                    <td><?= $i->id ?></td>
                    <td><?= $i->plan_name ?></td>
                    <td><?= $i->plan_type ?></td>
                    <td><?= $i->comission ?></td>
                    <td><?= $i->description ?></td>
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
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>