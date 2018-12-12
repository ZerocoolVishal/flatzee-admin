<?php use yii\helpers\Html; ?>

<div class="card shadow mb-7">
    <div class="card-header border-0">
        <h3 class="mb-0">Booked Appointments</h3>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Property</th>
                <th scope="col">User</th>
                <th scope="col">Agent</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $i): ?>
                <tr>
                    <td><?= $i->id ?></td>
                    <td><?= $i->date ?></td>
                    <td><?= $i->time ?></td>
                    <td>
                        <?= Html::a($i->property->title, ["property/view", 'id' => $i->agent->id], ['target' => '_blank']) ?>
                    </td>
                    <td>
                        <?= Html::a($i->usersIs->first_name." ".$i->usersIs->last_name, ["users/view", 'id' => $i->agent->id], ['target' => '_blank']) ?>
                    </td>
                    <td>
                        <?= Html::a($i->agent->first_name." ".$i->agent->last_name, ["agents/view", 'id' => $i->agent->id], ['target' => '_blank']) ?>
                    </td>
                    <td>
                        <?php
                        switch ($i->status) {
                            case 0:
                                echo '<span class="badge badge-pill badge-primary">Open</span>';
                                break;
                            case 1:
                                echo '<span class="badge badge-pill badge-success">Visited</span>';
                                break;
                            case 2:
                                echo '<span class="badge badge-pill badge-info">Close</span>';
                                break;
                            case 3:
                                echo '<span class="badge badge-pill badge-danger">Cancelled</span>';
                                break;
                        }?>
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
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
