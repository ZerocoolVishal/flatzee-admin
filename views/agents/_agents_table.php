<?php use yii\helpers\Html; ?>

<div class="card shadow mb-7">
    <div class="card-header border-0">
        <h3 class="mb-0">Agents</h3>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $i): ?>
                <tr>
                    <td><?= $i->id ?></td>
                    <td>
                        <?= $i->first_name . ' ' . $i->last_name ?>
                        <?= ($i->verified)? "<span class=\"badge badge-pill badge-info\">Verified</span>" : "" ?>
                        <?= ($i->rera_registered)? "<span class=\"badge badge-pill badge-success\">RERA</span>" : "" ?>
                    </td>
                    <td><?= $i->contact_number ?></td>
                    <td><?= $i->email ?></td>
                    <td><?= $i->address ?></td>
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
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

