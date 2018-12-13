<?php use yii\helpers\Html; ?>

<div class="card shadow" style="height: 100%">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Appointments <span
                            class="badge badge-pill badge-danger"><?= $appointmentsCount ?></span></h3>
            </div>
            <div class="col text-right">
                <?= Html::a('See All', ['appointment/'], ['class' => 'btn btn-sm btn-primary']) ?>
            </div>
        </div>
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
                <tr <?= ($i->seen) ? '' : 'class="bg-gradient-lighter"' ?>>
                    <td><?= $i->id ?></td>
                    <td><?= $i->date ?></td>
                    <td><?= $i->time ?></td>
                    <td>
                        <?= Html::a($i->property->title, ["property/view", 'id' => $i->agent->id], ['target' => '_blank']) ?>
                    </td>
                    <td>
                        <?= Html::a($i->usersIs->first_name . " " . $i->usersIs->last_name, ["users/view", 'id' => $i->agent->id], ['target' => '_blank']) ?>
                    </td>
                    <td>
                        <?= Html::a($i->agent->first_name . " " . $i->agent->last_name, ["agents/view", 'id' => $i->agent->id], ['target' => '_blank']) ?>
                    </td>
                    <td>
                        <?php
                        switch ($i->status) {
                            case 0:
                                echo '<span class="badge badge-pill badge-primary">Open</span>';
                                break;
                            case 1:
                                echo '<span class="badge badge-pill badge-info">Visited</span>';
                                break;
                            case 2:
                                echo '<span class="badge badge-pill badge-dark">Close</span>';
                                break;
                            case 3:
                                echo '<span class="badge badge-pill badge-danger">Cancelled</span>';
                                break;
                            case 4:
                                echo '<span class="badge badge-pill badge-success">Rented</span>';
                                break;
                        } ?>
                    </td>

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
